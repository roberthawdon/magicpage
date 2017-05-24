<?php

/** 
 * OP-EZY MagicPage Submit Navigation Item Page, Version 0.1.0
 * Inserts/edits or deletes data from editor 
 * into database.
 */

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
$query = "INSERT INTO " . $dbprefix . "navigation (label, link_url, parent_id) VALUES ('" . $label . "', '" . $linkto . "', '" . $childof . "');";
} elseif ($delete == "true") {
$query = "DELETE FROM " . $dbprefix ."navigation WHERE id='" . $itemid . "'";
} else {
$query("UPDATE " . $dbprefix . "navigation SET label='" . $label . "', link_url='" . $linkto . "', parent_id='" . $childof . "' WHERE id='" . $itemid . "';";
}

$con->query($query);

?>

<p>Updating Navigation</p>

<meta http-equiv="refresh" content="1; url=/?adm=go&action=navigation" />