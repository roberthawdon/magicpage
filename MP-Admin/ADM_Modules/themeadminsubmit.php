<?php

mysql_select_db($dbdatabase , $con);

$themelookup = mysql_query("SELECT value FROM " . $dbprefix . "shared WHERE mpoption='theme'");
while ($fetch = mysql_fetch_array($themelookup)) {
$selectedtheme = $fetch['value'];
}

include("" . $pathfolder . "" . $themes . "/" . $selectedtheme . "/MP-TAdmin/apply-settings.php");


?> 

<h1>Applying Theme Settings...</h1>

<meta http-equiv="refresh" content="1; url=/?adm=go&action=themeadmin" />