<?php

/** 
 * OP-EZY MagicPage Submit Settings Page, Version 0.1.0
 * Inserts/edits or deletes data from editor 
 * into database.
 */

$commonpagetext = htmlentities($_POST['elm1']);
$commonpagetext = html_entity_decode($commonpagetext, ENT_QUOTES);
$commonpagetext = addslashes($commonpagetext);
$sitename = addslashes($_POST['sitename']);
$orgname = addslashes($_POST['orgname']);
$sitetagline = addslashes($_POST['sitetagline']);
$description = addslashes($_POST['description']);
$tags = addslashes($_POST['tags']);
$url = $_POST['url'];
$theme = addslashes($_POST['theme']);
$defaultpage = $_POST['defaultpage'];
$maintenance = $_POST['maintenance'];
$maintenancepass = $_POST['maintenancepass'];

if ($maintenance != "1") {
$maintenance = "0";
}


$query = "UPDATE " . $dbprefix . "shared SET value=
CASE 
    WHEN mpoption='sitename' 
        THEN '" . $sitename . "'
    WHEN mpoption='orgname' 
        THEN '" . $orgname . "'
    WHEN mpoption='sitetagline' 
        THEN '". $sitetagline . "'
    WHEN mpoption='site_description' 
        THEN '" . $description . "'
    WHEN mpoption='site_metatags' 
        THEN '" . $tags . "'
    WHEN mpoption='siteurl' 
        THEN '" . $url . "'
    WHEN mpoption='theme' 
        THEN '" . $theme . "'
    WHEN mpoption='defaultpage' 
        THEN '" . $defaultpage . "'
    WHEN mpoption='sideboard' 
        THEN '" . $commonpagetext . "'
    WHEN mpoption='maintenance' 
        THEN '" . $maintenance . "'
    WHEN mpoption='mmoverride'
        THEN '" . $maintenancepass . "'
END
WHERE 
    `value` IS NOT NULL";

$con->query($query);

?>

<h1>Updating...</h1>

<meta http-equiv="refresh" content="1; url=/?adm=go&action=settings" />
