<?php
/*
 ex: set tabstop=2 shiftwidth=2 autoindent:
 +-------------------------------------------------------------------------+
 | Copyright (C) 2014 Nerijus Bendziunas <nerijus.bendziunas@gmail.com>    |
 |                                                                         |
 | This program is free software; you can redistribute it and/or           |
 | modify it under the terms of the GNU General Public License             |
 | as published by the Free Software Foundation; either version 2          |
 | of the License, or (at your option) any later version.                  |
 |                                                                         |
 | This program is distributed in the hope that it will be useful,         |
 | but WITHOUT ANY WARRANTY; without even the implied warranty of          |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the           |
 | GNU General Public License for more details.                            |
 +-------------------------------------------------------------------------+
*/

function plugin_Jump2Host_install() {
  api_plugin_register_hook('Jump2Host', 'top_header_tabs', 'Jump2Host_show_tab', 'setup.php');
  api_plugin_register_hook('Jump2Host', 'top_graph_header_tabs', 'Jump2Host_show_tab', 'setup.php');
}

function plugin_Jump2Host_uninstall() {
	/* Do any extra Uninstall stuff here */
}

function plugin_Jump2Host_check_config() {
  /* We have no configuration */
	return true;
}

function plugin_Jump2Host_version () {
  return Jump2Host_version();
}

function Jump2Host_version() {
	return array(
		'name'     => 'Jump2Host',
		'version'  => '0.5',
		'longname' => 'Jump to host view in tree mode',
		'author'   => 'Nerijus Bendziunas',
		'homepage' => 'https://github.com/benner/',
		'email'    => 'nerijus.bendziunas@gmail.com',
		'url'      => 'https://github.com/benner/Jump2Host'
	);
}

function Jump2Host_show_tab() {
  echo <<<EOF
    <div style="position:absolute; top: 10px; left: 700px;" id="searchplugin">
      <form action="plugins/Jump2Host/searchTreeId.php" method="GET">
        <input type="text" name="host" value="host" onfocus="this.value =''" />
        <input type="submit" name="submit" value="Jump" />
      </form>
      </div>
EOF;
}

