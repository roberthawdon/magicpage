<?php

/** 
 * OP-EZY MagicPage Submit Page, Version 0.0.11
 * Inserts/edits or deletes data from editor 
 * into database.
 */

mysql_select_db($dbdatabase , $con);

$titlepage = htmlentities(stripslashes($_POST['title']));
$done = htmlentities($_POST['elm1']);
$pagename = $_POST["pagename"];
$modifieddate = date('Y-m-d H:i:s');
$newpage = $_POST["newflag"];
$deletepage = $_POST["deletepage"];

if ($deletepage == "true") {

mysql_query("DELETE FROM " . $dbprefix ."pages WHERE urlfolder='" . $viewpage . "'");

echo "<h1>Deleting page...</h1>
<meta http-equiv=\"refresh\" content=\"1; url=/?adm=go&action=pages\" />";

}
else { 

$done = html_entity_decode($done, ENT_QUOTES);
// $titlepage = htmlentities($titlepage, ENT_QUOTES);
$done = addslashes($done);
$titlepage = addslashes($titlepage);

if ($newpage == 'true') {
$submit = mysql_query("INSERT INTO " . $dbprefix . "pages (title, content, date, urlfolder) VALUES ('" . $titlepage . "', '" . $done . "', '" . $modifieddate . "', '" . $pagename . "');");

if ( $submit == true ) {
    echo "<h1>Adding page...</h1>
<meta http-equiv=\"refresh\" content=\"1; url=/?adm=go&action=edit&page=" . $pagename . "\" />"; 
} else { 
    if ( mysql_errno() == 1062 ) { // if this error number is the duplicate error, handle it. 
        print "A page with the unique name " . $pagename . " already exists! Press \"back\" in your browser and change this element."; 
    } else {
        die( "Error in this query: " . mysql_error() . " " . $insert ); 
} 
}

} else {
mysql_query("UPDATE " . $dbprefix . "pages SET title='" . $titlepage . "', content='" . $done . "', date='" . $modifieddate . "', urlfolder='" . $pagename . "' WHERE  urlfolder='" . $viewpage . "';");

echo "<h1>Updating page...</h1>
<meta http-equiv=\"refresh\" content=\"1; url=/?adm=go&action=edit&page=" . $viewpage . "\" />";
}

}

?>



