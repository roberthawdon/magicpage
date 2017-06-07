<?php

$dbhost = $_POST["dbhost"];
$dbdatabase = $_POST["dbdatabase"];
$dbuser = $_POST["dbuser"];
$dbpassword = $_POST["dbpassword"];
$dbprefix = $_POST["dbprefix"];

$con = new PDO("mysql:host=" . $dbhost . ";dbname=" . $dbdatabase , $dbuser , $dbpassword);

if ( $con->errorCode() != 0 ) {
    print "Database Error";
}

$query = "SELECT COUNT(DISTINCT table_name) tables FROM information_schema.columns WHERE table_schema = '" . $dbdatabase . "'";

$result = $con->query($query);

while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    if ($row['tables'] != "0") {
        echo "Database is not empty. Assuming site already exists.";
            } else {
        echo "All OK. Creating new website.";
        $query = "SOURCE mpschema.sql";
        $con->query($query);
        $query = "INSERT INTO `" . $dbprefix . "shared` VALUES (1,'siteurl','http://magicpage'),(2,'sitename','My Website'),(3,'site_description','This is my website powered by MagicPage CMS'),(4,'site_metatags','magicpage,'),(5,'theme','default'),(6,'defaultpage','home'),(7,'sideboard','<p>This website is powered by MagicPage, click <a href=\"/?adm=go\">here</a> to access the administrator interface and customise your new site.</p>'),(8,'sitetagline','powered by MagicPage CMS'),(9,'orgname','Your Name'),(10,'maintenance','0'),(11,'commonheader',NULL),(12,'commonbodyoption',NULL),(13,'mmoverride','password')";
        $con->query($query);
    }
}

?>