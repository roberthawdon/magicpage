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

mysql_select_db($dbdatabase , $con);

$result = mysql_query("SELECT * FROM " . $dbprefix . "shared WHERE mpoption='site_metatags'");


while($row = mysql_fetch_array($result))
  {
  echo "" . $row['value'] . "";
  }

}

      elseif ($themearg == "sitename") {

mysql_select_db($dbdatabase , $con);

$result = mysql_query("SELECT * FROM " . $dbprefix . "shared WHERE mpoption='sitename'");


while($row = mysql_fetch_array($result))
  {
  echo "" . $row['value'] . "";
  }

}

      elseif ($themearg == "sitetagline") {

mysql_select_db($dbdatabase , $con);

$result = mysql_query("SELECT * FROM " . $dbprefix . "shared WHERE mpoption='sitetagline'");


while($row = mysql_fetch_array($result))
  {
  echo "" . $row['value'] . "";
  }

}

      elseif ($themearg == "orgname") {

mysql_select_db($dbdatabase , $con);

$result = mysql_query("SELECT * FROM " . $dbprefix . "shared WHERE mpoption='orgname'");


while($row = mysql_fetch_array($result))
  {
  echo "" . $row['value'] . "";
  }

}

      elseif ($themearg == "description") {

mysql_select_db($dbdatabase , $con);

$result = mysql_query("SELECT * FROM " . $dbprefix . "shared WHERE mpoption='site_description'");


while($row = mysql_fetch_array($result))
  {
  echo "" . $row['value'] . "";
  }

}

      elseif ($themearg == "title") {

mysql_select_db($dbdatabase , $con);

$result = mysql_query("SELECT * FROM " . $dbprefix . "pages WHERE urlfolder='" . $viewpage . "'");


while($row = mysql_fetch_array($result))
  {
  echo "" . $row['title'] . "";
  }

}

    elseif ($themearg == "content") {

mysql_select_db($dbdatabase , $con);

$result = mysql_query("SELECT * FROM " . $dbprefix . "pages WHERE urlfolder='" . $viewpage . "'");


while($row = mysql_fetch_array($result))
  {
  echo "" . $row['content'] . "";
  }

}

    elseif ($themearg == "sideboard") {

mysql_select_db($dbdatabase , $con);

$result = mysql_query("SELECT * FROM " . $dbprefix . "shared WHERE mpoption='sideboard'");


while($row = mysql_fetch_array($result))
  {
  echo "" . $row['value'] . "";
  }

}

    elseif ($themearg == "preheader") {

mysql_select_db($dbdatabase , $con);

$result = mysql_query("SELECT * FROM " . $dbprefix . "pages WHERE urlfolder='" . $viewpage . "'");


while($row = mysql_fetch_array($result))
  {
  eval ("" . $row['preheader'] . "");
  }

}

    elseif ($themearg == "extraheader") {

mysql_select_db($dbdatabase , $con);

$result = mysql_query("SELECT * FROM " . $dbprefix . "pages WHERE urlfolder='" . $viewpage . "'");


while($row = mysql_fetch_array($result))
  {
  echo "" . $row['extraheader'] . "";
  }

}

    elseif ($themearg == "extrabodyoption") {

mysql_select_db($dbdatabase , $con);

$result = mysql_query("SELECT * FROM " . $dbprefix . "pages WHERE urlfolder='" . $viewpage . "'");


while($row = mysql_fetch_array($result))
  {
  echo " " . $row['extrabodyoption'] . ""; #Make note of the extra space
  }

}

    else {

echo "Unknown element \"" . $themearg . "\"";

}

}

?>
