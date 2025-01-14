<?php
/**
 * @version $Id: yllen $
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
 @copyright Copyright (c) 2009-2021 PDF plugin team
 @license   AGPL License 3.0 or (at your option) any later version
            http://www.gnu.org/licenses/agpl-3.0-standalone.html
 @link      https://forge.glpi-project.org/projects/pdf
 @link      http://www.glpi-project.org/
 @since     2009
 --------------------------------------------------------------------------
*/


class PluginPdfUser extends PluginPdfCommon {

   static $rightname = "plugin_pdf";


   function __construct(CommonGLPI $obj=NULL) {
      $this->obj = ($obj ? $obj : new User());
   }

   static function getFields(){
      return ['name' => 'Login',
              'last_login' => 'Last login on',
              'realname' => 'Surname',
              'firstname' => 'First name',
              'is_active' => 'Active',
              'valid' => 'Valid date',
              'emails' => 'Emails',
              'phone' => 'Phone',
              'phone2' => 'Phone 2',
              'mobile' => 'Mobile phone',
              'category' => 'Category',
              'registration_number' => 'Administrative number',
              'title' => 'Title',
              'location' => 'Location',
              'language' => 'Language',
              'profile' => 'Default profile',
              'entity' => 'Default entity',
              'comments' => 'Comments'];
   }

   function defineAllTabsPDF($options=[]) {

      $onglets = parent::defineAllTabsPDF($options);
      unset($onglets['Profile_User$1']);
      unset($onglets['Group_User$1']);
      unset($onglets['Config$1']);
      unset($onglets['Synchronisation$1']);
      unset($onglets['Certificate_Item$1']);
      unset($onglets['Auth$1']);

      return $onglets;
   }

   static function displayLines($pdf, $lines){
      if (null !== $emails = $lines['emails']){
         $keys = array_keys($lines);
         $key = array_search('emails', $keys);
         parent::displayLines($pdf, array_slice($lines, 0, $key));
         $pdf->setColumnsSize(100);
         $pdf->displayline($emails);
         parent::displayLines($pdf, array_slice($lines, $key+1));
      } else {
         parent::displayLines($pdf, $lines);
      }
   }

   static function defineField($pdf, $item, $field){
      global $DB;
      $print = static::getFields()[$field];
      switch($field){
         case 'name':
         case 'realname':
         case 'firstname':
         case 'is_active':
         case 'phone':
         case 'phone2':
         case 'mobile':
         case 'registration_number':
            return '<b><i>'.sprintf(__('%1$s: %2$s'), __($print).'</i></b>', $item->fields[$field]);

         case 'last_login':
            return '<b><i>'.sprintf(__('Last login on %s').'</i></b>',
                                    Html::convDateTime($item->fields['last_login']));
         case 'valid':
            $end = '';
            if ($item->fields['end_date']) {
               $end = '<b><i> - '.sprintf(__('%1$s - %2$s'), __('Valid until').'</i></b>',
                                             Html::convDateTime($item->fields['end_date']));
            }
            return '<b><i>'.sprintf(__('%1$s : %2$s'), __('Valid since').'</i></b>',
                                    Html::convDateTime($item->fields['begin_date']).$end);
         case 'emails':
            $emails = [];
            foreach ($DB->request('glpi_useremails', ['users_id' => $item->getField('id')]) as $key => $email) {
               if ($email['is_default'] == 1) {
                  $emails[]= $email['email'] ." (".__('Default email').")";
               } else {
                  $emails[]= $email['email'];
               }
            }
            return '<b><i>'.sprintf(__('%1$s: %2$s'),
                                    _n('Email', 'Emails', Session::getPluralNumber()).'</i></b>',
                                    implode(", ", $emails));
         case 'category':
            return '<b><i>'.sprintf(__('%1$s: %2$s'), __('Category').'</i></b>',
                                    Dropdown::getDropdownName('glpi_usercategories',
                                                            $item->fields['usercategories_id']));
         case 'title':
            return '<b><i>'.sprintf(__('%1$s: %2$s'), _x('person', 'Title').'</i></b>',
                                    Dropdown::getDropdownName('glpi_usertitles',
                                                            $item->fields['usertitles_id']));
         case 'location':
            return '<b><i>'.sprintf(__('%1$s: %2$s'), __('Location').'</i></b>',
                                    Dropdown::getDropdownName('glpi_locations',
                                                            $item->fields['locations_id']));
         case 'language':
            return '<b><i>'.sprintf(__('%1$s: %2$s'), __('Language').'</i></b>',
                                    Dropdown::getLanguageName($item->fields['language']));
         case 'profile':
            return '<b><i>'.sprintf(__('%1$s: %2$s'), __('Default profile').'</i></b>',
                                    Dropdown::getDropdownName('glpi_profiles',
                                                            $item->fields['profiles_id']));
         case 'entity':
            return '<b><i>'.sprintf(__('%1$s: %2$s'), __('Default entity').'</i></b>',
                                    Dropdown::getDropdownName('glpi_entities',
                                                            $item->fields['entities_id']));
      }
   }

   static function pdfItems(PluginPdfSimplePDF $pdf, User $user, $tech) {
      global $CFG_GLPI, $DB;

      $dbu = new DbUtils();

      $ID = $user->getField('id');

      if ($tech) {
         $type_user   = $CFG_GLPI['linkuser_tech_types'];
         $type_group  = $CFG_GLPI['linkgroup_tech_types'];
         $field_user  = 'users_id_tech';
         $field_group = 'groups_id_tech';
         $title       = __('Managed items');
         $conso       = false;
      } else {
         $type_user   = $CFG_GLPI['linkuser_types'];
         $type_group  = $CFG_GLPI['linkgroup_types'];
         $field_user  = 'users_id';
         $field_group = 'groups_id';
         $title       = __('Used items');
         $conso       = true;
      }

      $pdf->setColumnsSize(100);
      $pdf->displayTitle('<b>'.$title.'</b>');

      $pdf->setColumnsSize(15,15,15,15,15,15,10);
      $pdf->displayTitle(__('Type'),  __('Entity'), __('Name'), __('Serial number'),
                         __('Inventory number'), __('Status'), '');

      $empty = true;
      foreach ($type_user as $itemtype) {
         if (!($item = $dbu->getItemForItemtype($itemtype))) {
            continue;
         }
         if ($item->canView()) {
            $itemtable = $dbu->getTableForItemType($itemtype);

            $query = ['FROM'  => $itemtable,
                      'WHERE' => [$field_user => $ID]];

            if ($item->maybeTemplate()) {
               $query['WHERE']['is_template'] = 0;
            }
            if ($item->maybeDeleted()) {
               $query['WHERE']['is_deleted'] = 0;
            }

            $result    = $DB->request($query);

            $type_name = $item->getTypeName();

            if (count($result)) {
               while ($data = $result->next()) {
                  $name  = $data["name"];
                  if (empty($name)) {
                     $name = sprintf(__('%1$s (%2$s)'), $name, $data["id"]);
                  }
                  $linktype = "";
                  if ($data[$field_user] == $ID) {
                     $linktype = User::getTypeName(1);
                  }
                  $pdf->displayLine($item->getTypeName(1),
                                    Dropdown::getDropdownName("glpi_entities", $data["entities_id"]),
                                    $name, isset($data["serial"]) ? $data["serial"] : '',
                                    isset($data["otherserial"]) ? $data["otherserial"] : '',
                                    isset($data["states_id"])
                                     ? Dropdown::getDropdownName("glpi_states", $data['states_id'])
                                     : '',
                                    $linktype);
               }
               $empty = false;
            }
         }
      }
      if (!$empty) {
         $pdf->setColumnsSize(15,15,15,15,15,15,10);
         $pdf->displayTitle(__('Type'),  __('Entity'), __('Name'), __('Serial number'),
                            __('Inventory number'), __('Status'), '');
      }

      $group_where = "";
      $groups      = [];

      $result = $DB->request(['SELECT'    => ['glpi_groups_users.groups_id', 'name'],
                              'FROM'      => 'glpi_groups_users',
                              'LEFT JOIN' => ['glpi_groups'
                                               => ['FKEY' => ['glpi_groups'       => 'id',
                                                              'glpi_groups_users' => 'groups_id']]],
                              'WHERE'     => ['users_id' => $ID]]);

      $number = count($result);

      if ($number > 0) {
         $first = true;

         while ($data = $result->next()) {
            if ($first) {
               $first = false;
            } else {
               $group_where .= " OR ";
            }

            $group_where               .= " `".$field_group."` = '".$data["groups_id"]."' ";
            $groups[$data["groups_id"]] = $data["name"];
         }
         $empty = false;

         foreach ($type_group as $itemtype) {
            if (!($item = $dbu->getItemForItemtype($itemtype))) {
               continue;
            }
            if ($item->canView() && $item->isField($field_group)) {
               $itemtable = $dbu->getTableForItemType($itemtype);

               $query = ['FROM'  => $itemtable,
                        'WHERE' => [$group_where]];

               if ($item->maybeTemplate()) {
                  $query['WHERE']['is_template'] = 0;
               }
               if ($item->maybeDeleted()) {
                  $query['WHERE']['is_deleted'] = 0;
               }

               $result    = $DB->request($query, true);

               $type_name = $item->getTypeName();

               if (count($result)) {
                  while ($data = $result->next()) {
                     $name   = $data["name"];
                     if (empty($name)) {
                        $name = sprintf(__('%1$s (%2$s)'), $name, $data["id"]);
                     }
                     $linktype = "";
                     if (isset($groups[$data[$field_group]])) {
                        $linktype = sprintf(__('%1$s = %2$s'), _n('Group', 'Groups', 1),
                                            $groups[$data[$field_group]]);
                     }
                     $pdf->displayLine($item->getTypeName(1),
                                       Dropdown::getDropdownName("glpi_entities", $data["entities_id"]),
                                       $name, $data["serial"], $data["otherserial"],
                                       Dropdown::getDropdownName("glpi_states", $data['states_id']),
                                       $linktype);
                  }
               }
            }
         }
      }
      if ($empty) {
         $pdf->setColumnsSize(100);
         $pdf->displayLine(sprintf(__('%1$s: %2$s'), $title,__('No item to display')));
      }
      $pdf->displaySpace();

      if ($conso) {
         $pdf->setColumnsSize(100);
         $pdf->displayTitle('<b>'.__('Used consumables').'</b>');

         $pdf->setColumnsSize(70,30);
         $pdf->displayTitle(__('Name'),  __('Use date'));

         $iterator = $DB->request(['FROM'      => 'glpi_consumables',
                                   'LEFT JOIN' => ['glpi_consumableitems'
                                                   => ['FKEY' => ['glpi_consumables' => 'consumableitems_id',
                                                                  'glpi_consumableitems' => 'id']]],
                                   'WHERE'     => ['NOT'      => ['date_out' => 'NULL'],
                                                   'itemtype' => 'User',
                                                   'items_id' => $ID],
                                   'ORDER'     => 'date_out DESC']);

         while ($dataconso = $iterator->next()) {
            $pdf->displayLine($dataconso["name"], Html::convDate($dataconso["date_out"]));
         }
      }
   }

   static function displayTabContentForPDF(PluginPdfSimplePDF $pdf, CommonGLPI $item, $tab) {

      $tree = isset($_REQUEST['item']['_tree']);
      $user = isset($_REQUEST['item']['_user']);

      switch ($tab) {
         case 'User$1' :
            self::pdfItems($pdf, $item, false);
            break;

         case 'User$2' :
            self::pdfItems($pdf, $item, true);
            break;

         case 'Reservation$1' :
            PluginPdfReservation::pdfForUser($pdf, $item);
            break;

         default :
            return false;
      }
      return true;
   }
}