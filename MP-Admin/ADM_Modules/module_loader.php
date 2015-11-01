<?php

/**
 * OP-EZY MagicPage Admin Functions Module, Version 0.0.6
 * Reduces the amount of PHP and MySQL code in each theme by using the
 * "mpadmin" function defined in this module.
 */

function mpadmin($admfunction) {

global $con;
global $dbhost;
global $dbuser;
global $dbpassword;
global $dbdatabase;
global $dbprefix;
global $themes;
global $common;
global $viewpage;
global $pathfolder;
global $path;
global $MPTheme;

if ($admfunction == "") {

include("defaultpage.php");

}

elseif ($admfunction == "settings") {

include("mpsettings.php");

}

elseif ($admfunction == "submitsettings") {

include("submitsettings.php");

}


elseif ($admfunction == "pages") {

include("listpages.php");

}

elseif ($admfunction == "edit") {

include("editpage.php");

}

elseif ($admfunction == "login") {

include("login.php");

}

elseif ($admfunction == "checkuser") {

include("checkuser.php");

}

elseif ($admfunction == "logout") {

include("logout.php");

}

elseif ($admfunction == "navigation") {

include("editnavigation.php");

}

elseif ($admfunction == "navigationitem") {

include("editnavigationitem.php");

}

elseif ($admfunction == "submititem") {

include("submititem.php");

}

elseif ($admfunction == "themeadmin") {

include("themeadmin.php");

}

elseif ($admfunction == "themeadminsubmit") {

include("themeadminsubmit.php");

}

elseif ($admfunction == "usersettings") {

include("usersettings.php");

}

elseif ($admfunction == "edituser") {

include("edituser.php");

}

elseif ($admfunction == "applyuser") {

include("applyuser.php");

}

elseif ($admfunction == "plugins") {

include("listplugins.php");

}

elseif ($admfunction == "submit") {

include("submit.php");

}

else {

}

}

?>
