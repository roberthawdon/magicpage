<?php

/**
 * OP-EZY MagicPage Common Theme Functions Module, Version 0.0.10
 * Reduces the amount of PHP and MySQL code in each theme by using the
 * "mp-import" function defined in this module. This makes building themes
 * much easier too.
 */

function mpimport($themearg) {

global $con;
global $dbhost;
global $dbuser;
global $dbpassword;
global $dbdatabase;
global $dbprefix;
global $themes;
global $common;
global $viewpage;

      if ($themearg == "keywords") {


$query = "SELECT * FROM " . $dbprefix . "shared WHERE mpoption='site_metatags'";
$result = $con->query($query);

while($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  echo "" . $row['value'] . "";
  }

}

      elseif ($themearg == "sitename") {


$query = "SELECT * FROM " . $dbprefix . "shared WHERE mpoption='sitename'";
$result = $con->query($query);


while($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  echo "" . $row['value'] . "";
  }

}

      elseif ($themearg == "sitetagline") {


$query = "SELECT * FROM " . $dbprefix . "shared WHERE mpoption='sitetagline'";
$result = $con->query($query);


while($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  echo "" . $row['value'] . "";
  }

}

      elseif ($themearg == "orgname") {


$query = "SELECT * FROM " . $dbprefix . "shared WHERE mpoption='orgname'";
$result = $con->query($query);


while($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  echo "" . $row['value'] . "";
  }

}

      elseif ($themearg == "description") {


$query = "SELECT * FROM " . $dbprefix . "shared WHERE mpoption='site_description'";
$result = $con->query($query);


while($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  echo "" . $row['value'] . "";
  }

}

      elseif ($themearg == "title") {


$query = "SELECT * FROM " . $dbprefix . "pages WHERE urlfolder='" . $viewpage . "'";
$result = $con->query($query);


while($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  echo "" . $row['title'] . "";
  }

}

    elseif ($themearg == "content") {


$query = "SELECT * FROM " . $dbprefix . "pages WHERE urlfolder='" . $viewpage . "'";
$result = $con->query($query);


while($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  echo "" . $row['content'] . "";
  }

}

    elseif ($themearg == "sideboard") {


$query = "SELECT * FROM " . $dbprefix . "shared WHERE mpoption='sideboard'";
$result = $con->query($query);


while($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  echo "" . $row['value'] . "";
  }

}

    elseif ($themearg == "preheader") {


$query = "SELECT * FROM " . $dbprefix . "pages WHERE urlfolder='" . $viewpage . "'";
$result = $con->query($query);


while($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  eval ("" . $row['preheader'] . "");
  }

}

    elseif ($themearg == "extraheader") {


$query = "SELECT * FROM " . $dbprefix . "pages WHERE urlfolder='" . $viewpage . "'";
$result = $con->query($query);


while($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  echo "" . $row['extraheader'] . "";
  }

}

    elseif ($themearg == "extrabodyoption") {


$query = "SELECT * FROM " . $dbprefix . "pages WHERE urlfolder='" . $viewpage . "'";
$result = $con->query($query);


while($row = $result->fetch(PDO::FETCH_ASSOC))
  {
  echo " " . $row['extrabodyoption'] . ""; #Make note of the extra space
  }

}

    else {

echo "Unknown element \"" . $themearg . "\"";

}

}

?>
