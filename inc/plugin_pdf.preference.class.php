<?php

/*
 ----------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2008 by the INDEPNET Development Team.
 
 http://indepnet.net/   http://glpi-project.org/
 ----------------------------------------------------------------------

 LICENSE

	This file is part of GLPI.

    GLPI is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    GLPI is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with GLPI; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 ------------------------------------------------------------------------
*/

// Original Author of file: BALPE Dévi
// Purpose of file:
// ----------------------------------------------------------------------

class PluginPdfPreferences extends CommonDBTM {

	function PluginPdfPreferences() {
		$this->table = "glpi_plugin_pdf_preference";
	}

	function showForm($target) {
		global  $LANG, $DB, $CFG_GLPI, $PLUGIN_HOOKS;

		echo "<div align='center' id='pdf_type'>";
		foreach ($PLUGIN_HOOKS['plugin_pdf'] as $type => $plug) {
			plugin_pdf_menu($type, $target,-1);
		}
		echo "</div>";
	}
}
?>
