<?php

/**
 * OP-EZY MagicPage Common Theme Functions Module, Version 0.1.0
 * Reduces the amount of PHP and MySQL code in each theme by using the
 * "mpimport" function defined in this module. This makes building themes
 * much easier too.
 */

function fetchpage() {
    global $con;
    global $dbhost;
    global $dbuser;
    global $dbpassword;
    global $dbdatabase;
    global $dbprefix;
    global $viewpage;

    $query = "SELECT title, content, owner, date, extraheader, extrabodyoption, preheader FROM MP_pages WHERE urlfolder = '" . $viewpage . "'";
    $result = $con->query($query);

    if ($result->rowCount() == 1){
        while($row = $result->fetch(PDO::FETCH_ASSOC))
        {
            $pagestatuscode      = "200";
            $pagetitle           = $row['title'];
            $pagecontent         = $row['content'];
            $pageowner           = $row['owner'];
            $pagedate            = $row['date'];
            $pageextraheader     = $row['extraheader'];
            $pageextrabodyoption = $row['extrabodyoption'];
            $pagepreheader       = $row['preheader'];
        }
    } elseif ($result->rowCount() == 0){
        // TO DO: Make this a custom setting.
        $pagestatuscode      = "404";
        $pagetitle           = "Not found";
        $pagecontent         = "<p>The page you're looking for is not found.</p>";
        $pageowner           = "";
        $pagedate            = "";
        $pageextraheader     = "";
        $pageextrabodyoption = "";
        $pagepreheader       = "";
    } else {
        // If we get more than one result, something's gone horribly, horribly wrong.
        $pagestatuscode      = "500";
        $pagetitle           = "Internal Server Error";
        $pagecontent         = "<p>There has been a fault retrieving this page.</p>";
        $pageowner           = "";
        $pagedate            = "";
        $pageextraheader     = "";
        $pageextrabodyoption = "";
        $pagepreheader       = "";
    }

    return array ($pagestatuscode, $pagetitle, $pagecontent, $pageowner, $pagedate, $pageextraheader, $pageextrabodyoption, $pagepreheader);
}

function mpimport($themearg) {

    global $pagedata;
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

        echo $pagedata[1];

    }

    elseif ($themearg == "content") {


        echo $pagedata[2];

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


        echo $pagedata[7];

    }

    elseif ($themearg == "extraheader") {


        echo $pagedata[5];

    }

    elseif ($themearg == "extrabodyoption") {


        echo $pagedata[6];

    }

    else {

        echo "Unknown element \"" . $themearg . "\"";

    }

}

?>
