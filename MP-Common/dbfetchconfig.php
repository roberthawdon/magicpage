<?php

/**
 * OP-EZY MagicPage Common Database Config Fetch, Version 0.1.0
 * This module loads the configuration arguments from the Database
 */ 

mysql_select_db($dbdatabase , $con);


$result = mysql_query("SELECT * FROM " . $dbprefix . "shared WHERE mpoption='siteurl'");


while($row = mysql_fetch_array($result))
  {
  $path = "" . $row['value'] . "";
  }

$result = mysql_query("SELECT * FROM " . $dbprefix . "shared WHERE mpoption='theme'");


while($row = mysql_fetch_array($result))
  {
  $MPTheme = "" . $row['value'] . "";
  }

$result = mysql_query("SELECT * FROM " . $dbprefix . "shared WHERE mpoption='defaultpage'");


while($row = mysql_fetch_array($result))
  {
  $HomepageID = "" . $row['value'] . "";
  }

?>