<?php

/** 
 * OP-EZY MagicPage Submit Navigation Item Page, Version 0.0.1
 * Inserts/edits or deletes data from editor 
 * into database.
 */

mysql_select_db($dbdatabase , $con);

$itemid = $_POST['itemid'];
$label = $_POST['label'];
$mplink = $_POST['mplink'];
$linkbox = $_POST['linkbox'];
$childof = $_POST['parent'];
$delete = $_POST['delete'];

if ($mplink == "other") {
$linkto = $linkbox;
} else {
$linkto = $mplink;
}

if ($itemid == "new") {
mysql_query("INSERT INTO " . $dbprefix . "navigation (label, link_url, parent_id) VALUES ('" . $label . "', '" . $linkto . "', '" . $childof . "');");
} elseif ($delete == "true") {
mysql_query("DELETE FROM " . $dbprefix ."navigation WHERE id='" . $itemid . "'");
} else {
mysql_query("UPDATE " . $dbprefix . "navigation SET label='" . $label . "', link_url='" . $linkto . "', parent_id='" . $childof . "' WHERE id='" . $itemid . "';");
}

?>

<p>Updating Navigation</p>

<meta http-equiv="refresh" content="1; url=/?adm=go&action=navigation" />