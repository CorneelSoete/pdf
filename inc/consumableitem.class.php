<?php
/**
 * @version $Id: setup.php 378 2014-06-08 15:12:45Z yllen $
 -------------------------------------------------------------------------
 LICENSE

 This file is part of PDF plugin for GLPI.

 PDF is free software: you can redistribute it and/or modify
 it under the terms of the GNU Affero General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

 PDF is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU Affero General Public License for more details.

 You should have received a copy of the GNU Affero General Public License
 along with Reports. If not, see <http://www.gnu.org/licenses/>.

 @package   pdf
 @authors   Nelly Mahu-Lasson, Remi Collet
 @copyright Copyright (c) 2018-2021 PDF plugin team
 @license   AGPL License 3.0 or (at your option) any later version
            http://www.gnu.org/licenses/agpl-3.0-standalone.html
 @link      https://forge.glpi-project.org/projects/pdf
 @link      http://www.glpi-project.org/
 @since     2009
 --------------------------------------------------------------------------
*/


class PluginPdfConsumableItem extends PluginPdfCommon {


   static $rightname = "plugin_pdf";


   function __construct(CommonGLPI $obj=NULL) {
      $this->obj = ($obj ? $obj : new CartridgeItem());
   }

   static function getFields(){
      $fields = array_merge(parent::getFields(), [
         'reference' => 'Reference',
         'stock_location' => 'Stock location',
         'location' => 'Stock location',
         'alarm_threshold' => 'Alert threshold']);
      $remove = ['type', 'tech', 'techgroup', 'model', 'contactnum', 'serial', 'contact', 'user', 'management', 'group'];
      foreach($remove as $removed){
         unset($fields[$removed]);
      }
      return $fields;
   }

   function defineAllTabsPDF($options=[]) {

      $onglets = parent::defineAllTabsPDF($options);
      return $onglets;
   }

   static function defineField($pdf, $item, $field){
      if(isset(parent::getFields()[$field])){
         return PluginPdfCommon::mainField($pdf, $item, $field);
      } else {
         switch($field) {
            case 'reference':
               return '<b><i>'.sprintf(__('%1$s: %2$s'), __('Reference').'</i></b>', $item->fields['ref']);
            case 'stock_location':
               return '<b><i>'.sprintf(__('%1$s: %2$s'), __('Stock location').'</i></b>',
                                       Dropdown::getDropdownName('glpi_locations',
                                                               $item->fields['locations_id']));
            case 'alarm_threshold':
               return '<b><i>'.sprintf(__('%1$s: %2$s'),  __('Alert threshold').'</i></b>',
                                       $item->getField('alarm_threshold'));
         }
      }
   }


   static function displayTabContentForPDF(PluginPdfSimplePDF $pdf, CommonGLPI $item, $tab) {

      switch ($tab) {
         case 'Consumable$1' :
            self::pdfForConsumableItem($pdf, $item, false);
            self::pdfForConsumableItem($pdf, $item, true);
            break;

         default :
            return false;
      }
      return true;
   }


   static function pdfForConsumableItem(PluginPdfSimplePDF $pdf, ConsumableItem $item,  $show_old = false) {
      global $DB;

      $dbu = new DbUtils();

      $instID = $item->getField('id');
      if (!$item->can($instID, READ)) {
         return false;
      }

      $where = ['consumableitems_id' => $instID];
      $order = ['date_in', 'id'];
      if (!$show_old) { // NEW
         $where += ['date_out' => 'NULL'];
      } else { //OLD
         $where += ['NOT'   => ['date_out' => 'NULL']];
         $order = ['date_out DESC'] + $order;
      }

      $number = $dbu->countElementsInTable("glpi_consumables", $where);

      $iterator = $DB->request('glpi_consumables',
                               ['WHERE'  => $where,
                                'ORDER'  => $order]);

      if (!$number) {
         $pdf->setColumnsSize(100);
         $pdf->displayTitle(__('No consumable'));
      } else {
         if (!$show_old) {
            $pdf->setColumnsSize(50,50);
            $pdf->displayTitle("<b><i>".sprintf(__('%1$s: %2$s'), __('Total'),
                                                Consumable::getTotalNumber($instID))."</i></b>",
                               "<b><i>".sprintf(__('%1$s: %2$s'),
                                                _nx('consumable','New','New',$instID),
                                                Consumable::getUnusedNumber($instID))."</i></b>");
            $pdf->displayTitle("", "<b><i>".sprintf(__('%1$s: %2$s'),
                                                    _nx('consumable','Used','Used',$instID),
                                                          Consumable::getOldNumber($instID)));
         } else { // Old
            $pdf->setColumnsSize(100);
            $pdf->displayTitle("<b>".__('Used consumables')."</b>");
         }

         if (!$show_old) {
            $pdf->setColumnsSize(10,45,45);
            $pdf->displayLine("<b>".__('ID')."</b>", "<b>"._x('item', 'State')."</b>",
                              "<b>".__('Add date')."</b>");
         } else {
            $pdf->setColumnsSize(8,23,23,23,23);
            $pdf->displayLine("<b>".__('ID')."</b>", "<b>"._x('item', 'State')."</b>",
                              "<b>".__('Add date')."</b>", "<b>".__('Use date')."</b>",
                              "<b>".__('Given to')."</b>");
            }

         while ($data = $iterator->next()) {
            $date_in  = Html::convDate($data["date_in"]);
            $date_out = Html::convDate($data["date_out"]);

            if (!$show_old) {
               $pdf->setColumnsSize(10,45,45);
               $pdf->displayLine($data["id"], Consumable::getStatus($data["id"]), $date_in);
            } else {
               if ($item = getItemForItemtype($data['itemtype'])) {
                  if ($item->getFromDB($data['items_id'])) {
                     $name = $item->getNameID();
                  }
               }
               $pdf->setColumnsSize(8,23,23,23,23);
               $pdf->displayLine($data["id"], Consumable::getStatus($data["id"]), $date_in,
                                 $date_out, $name);
            }
         }
      }
      $pdf->displaySpace();
   }
}