<?php

$user = $_POST['user'];

mysql_select_db($dbdatabase , $con);

$sql = "SELECT user_login, user_pass FROM " . $dbprefix . "users WHERE user_login='" . $user . "'"; 
$items = mysql_query($sql) or die(mysql_error());

while ($fetch = mysql_fetch_array($items)) {
$fetchpass = $fetch['user_pass'];
}

$newdate = date('Y-m-d H:i:s');
$delete = $_POST['delete'];
$oldpass = $_POST['currentpassword'];
$newpass1 = $_POST['password1'];
$newpass2 = $_POST['password2'];
$firstname = $_POST['firstname'];
$middlenames = $_POST['middlenames'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$regdate = $_POST['regdate'];
$admin = $_POST['admin'];
if ($admin != "1") {
$admin = "0";
}
$type = $_POST['type'];

if ($type == "new") {
$newusername = $_POST['username'];
}

$oldsalt = $user . $regdate . $oldpass;

if ($type == "edit") {

if ($delete == "true") {

mysql_query("DELETE FROM " . $dbprefix ."users WHERE user_login='" . $user . "'");

echo "<h1>Deleting user...</h1>
<meta http-equiv=\"refresh\" content=\"1; url=/?adm=go&action=usersettings\" />";

}

if ($oldpass != "") {
if (md5($oldsalt) == $fetchpass) {
if ($newpass1 == $newpass2) {

$seasoning = $user . "" . $regdate . "" . $newpass1;
$saltedpass = md5($seasoning);

mysql_query("UPDATE " . $dbprefix . "users SET first_name='" . $firstname . "', middle_names='" . $middlenames . "', last_name='" . $lastname . "', user_pass='" . $saltedpass . "', user_email='" . $email . "', admin='" . $admin . "'  WHERE user_login='" . $user . "'") or die('Query failed: ' . mysql_error());

echo "<h1>Updating...</h1>
<meta http-equiv=\"refresh\" content=\"1; url=/?adm=go&action=edituser&user=" . $user . "\" />";

} else {

echo "<p>The new password you specified wasn't entered correctly in both boxes</p>";

}

} else {

echo "<p>The password you specified was incorrect</p>";

}

} else {

mysql_query("UPDATE " . $dbprefix . "users SET first_name='" . $firstname . "', middle_names='" . $middlenames . "', last_name='" . $lastname . "', user_email='" . $email . "', admin='" . $admin . "'  WHERE user_login='" . $user . "'") or die('Query failed: ' . mysql_error());

echo "<h1>Updating...</h1>
<meta http-equiv=\"refresh\" content=\"1; url=/?adm=go&action=edituser&user=" . $user . "\" />";

}

} elseif ($type == "new") {
if ($newpass1 == $newpass2) {


$seasoning = $newusername . "" . $newdate . "" . $newpass1;
$saltedpass = md5($seasoning);

$submit = mysql_query("INSERT INTO " . $dbprefix . "users (first_name, middle_names, last_name, user_login, user_pass, user_email, admin, user_registered) VALUES ('" . $firstname . "', '" . $middlenames . "', '" . $lastname . "', '" . $newusername . "', '" . $saltedpass . "', '" . $email . "', '" . $admin . "', '" . $newdate . "');");

if ( $submit == true ) {
    echo "<h1>Adding New User...</h1>
<meta http-equiv=\"refresh\" content=\"1; url=/?adm=go&action=edituser&user=" . $newusername . "\" />";
} else { 
    if ( mysql_errno() == 1062 ) { // if this error number is the duplicate error, handle it. 
        print "A user with the unique name " . $username . " already exists! Press \"back\" in your browser and change this element."; 
    } else {
        die( "Error in this query: " . mysql_error() . " " . $insert ); 
} 
}





} else {
echo "<p>The new password you specified wasn't entered correctly in both boxes</p>";
}
} 

?>