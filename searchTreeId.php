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

include("../../include/global.php");

$url = $config['url_path'];

if (!empty($_REQUEST['host'])) {
  $host = sql_sanitize(trim($_REQUEST['host']));
  $query = "SELECT g.graph_tree_id, g.id FROM graph_tree_items g, host h WHERE g.host_id = h.id AND h.hostname = '$host' LIMIT 1";
  $host_info = db_fetch_row($query);

  if ($host_info) {
    $url = $config['url_path'].'/graph_view.php?action=tree&tree_id=' . $host_info['graph_tree_id'] . '&leaf_id=' . $host_info['id'];
  }
}

header("Location: $url");

