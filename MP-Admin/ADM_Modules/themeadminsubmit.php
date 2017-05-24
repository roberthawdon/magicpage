<?php

$query = "SELECT value FROM " . $dbprefix . "shared WHERE mpoption='theme'";
$result = $con->query($query);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$selectedtheme = $row['value'];
}

include("" . $pathfolder . "" . $themes . "/" . $selectedtheme . "/MP-TAdmin/apply-settings.php");


?> 

<h1>Applying Theme Settings...</h1>

<meta http-equiv="refresh" content="1; url=/?adm=go&action=themeadmin" />
