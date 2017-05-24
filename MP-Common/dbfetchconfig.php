<?php

/**
 * OP-EZY MagicPage Common Database Config Fetch, Version 0.2.0
 * This module loads the configuration arguments from the Database
 */ 

$query = "SELECT * FROM " . $dbprefix . "shared WHERE mpoption='siteurl'";

$result = $con->query($query);


while($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  $path = $row['value'];
  }

$query = "SELECT * FROM " . $dbprefix . "shared WHERE mpoption='theme'";

$result = $con->query($query);


while($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  $MPTheme = $row['value'];
  }

$query = "SELECT * FROM " . $dbprefix . "shared WHERE mpoption='defaultpage'";

$result = $con->query($query);


while($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  $HomepageID = $row['value'];
  }

?>
