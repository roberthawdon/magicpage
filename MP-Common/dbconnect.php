<?php

/**
 * OP-EZY MagicPage Common MySQL Database Connection Module, Version 0.0.1
 */

$con = mysql_connect($dbhost , $dbuser , $dbpassword);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }


?>