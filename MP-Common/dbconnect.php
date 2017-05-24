<?php

/**
 * OP-EZY MagicPage Common MySQL Database Connection Module, Version 0.1.0
 */

$con = new PDO("mysql:host=" . $dbhost . ";dbname=" . $dbdatabase , $dbuser , $dbpassword);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


?>
