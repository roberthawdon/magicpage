<?php

mysql_select_db($dbdatabase , $con);

$themelookup = mysql_query("SELECT value FROM " . $dbprefix . "shared WHERE mpoption='theme'");
while ($fetch = mysql_fetch_array($themelookup)) {
$selectedtheme = $fetch['value'];
}

if (file_exists("" . $pathfolder . "" . $themes . "/" . $selectedtheme . "/MP-TAdmin/index.php")){
include("" . $pathfolder . "" . $themes . "/" . $selectedtheme . "/MP-TAdmin/index.php");
} else {
echo "<h1>No configuration page found for the theme \"" . $selectedtheme . "\"</h1>";
}

?>