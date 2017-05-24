<?php

$query = "SELECT value FROM " . $dbprefix . "shared WHERE mpoption='theme'";
$result = $con->query($query);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$selectedtheme = $row['value'];
}

if (file_exists("" . $pathfolder . "" . $themes . "/" . $selectedtheme . "/MP-TAdmin/index.php")){
include("" . $pathfolder . "" . $themes . "/" . $selectedtheme . "/MP-TAdmin/index.php");
} else {
echo "<h1>No configuration page found for the theme \"" . $selectedtheme . "\"</h1>";
}

?>