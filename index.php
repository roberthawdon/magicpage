<?php

/**
 * Magicpage loader, Version 0.1.0
 * Written by Robert Ian Hawdon.
 * Connects to database, loads information, displays the page and closes connection again.
 * Loads admin section if requested
 */

/** Check if first run is required */

$mpversion = "0.3.0-Development-Authenticaiton";

$expectedconf = 'config.php';

if (file_exists($expectedconf)) {
    $config = $expectedconf;
} else {
    header( 'Location: /MP-Admin/firstrun.php' ) ;
}

/** Load MagicPage Config File */

include($config);

/** Connect to Database */

include($common . "/dbconnect.php");

/** Global Config */

include($common . "/dbfetchconfig.php");

/** MagicPage Functions **/

include($common . "/mpfunctions.php");

/** Load common theme functions */

include($common . "/themefunctions.php");

/** Check for maintenance mode and override password **/

$query = "SELECT value FROM " . $dbprefix . "shared WHERE mpoption='maintenance'";
$result = $con->query($query);
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
$maintenance = $row['value'];
}

$query = "SELECT value FROM " . $dbprefix . "shared WHERE mpoption='mmoverride'";
$result = $con->query($query);
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
$mmoverridepass = $row['value'];
}

$mmoverride = $_GET['mmoverride'];


/** Admin Redirect **/

$adm = $_GET['adm'];

if ( $adm == "go" ) {

include ("MP-Admin/adminpage.php");

} elseif ( $maintenance == "1" AND $mmoverride != $mmoverridepass ) {

/** If maintenance mode is true, then load block the site from showing unless overridden **/



include ("MP-Admin/Error/maintenance.php");



} else {

/** Loader */

$viewpage = $_GET['viewpage'];

if ( $viewpage == "" ) {
      $viewpage = $HomepageID ;
}


include($themes . "/" . $MPTheme . "/index.php"); 

}

include($common . "/dbdisconnect.php");

/**
 * End of OP-EZY Magicpage loader
 */

?> 
