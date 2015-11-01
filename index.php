<?php

/**
 * OP-EZY Magicpage loader, Version 0.0.12
 * Written by Robert Ian Hawdon.
 * Connects to database, loads information, displays the page and closes connection again.
 * Loads admin section if requested
 */

/** Check if first run is required */

$expectedconf = 'config.php';

if (file_exists($expectedconf)) {
    $config = $expectedconf;
} else {
    header( 'Location: /MP-Admin/firstrun.php' ) ;
}

/** Load MagicPage Config File */

include($config);

/** Connect to Database */

include("" . $common . "/dbconnect.php");

/** Global Config */

include("" . $common . "/dbfetchconfig.php");

$mpversion = "0.2.0-Beta4";

/** Load common theme functions */

include("" . $common . "/themefunctions.php");

/** Check for maintenance mode and override password **/

$maintenance = mysql_query("SELECT value FROM " . $dbprefix . "shared WHERE mpoption='maintenance'");
while ($fetch = mysql_fetch_array($maintenance)) {
$maintenance = $fetch['value'];
}

$mmoverridepass = mysql_query("SELECT value FROM " . $dbprefix . "shared WHERE mpoption='mmoverride'");
while ($fetch = mysql_fetch_array($mmoverridepass)) {
$mmoverridepass = $fetch['value'];
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


include("" . $themes . "/" . $MPTheme . "/index.php"); 

}

include("" . $common . "/dbdisconnect.php");

/**
 * End of OP-EZY Magicpage loader
 */

?> 
