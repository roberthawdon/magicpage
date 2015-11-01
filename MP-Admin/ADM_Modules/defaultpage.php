<?php 

global $loggedinuser;

mysql_select_db($dbdatabase , $con);

$sql = "SELECT first_name, middle_names, last_name, user_login, user_pass, user_email, user_registered FROM " . $dbprefix . "users WHERE user_login='" . $loggedinuser . "'";

$items = mysql_query($sql) or die(mysql_error());

while ($fetch = mysql_fetch_array($items)) {
$firstname = $fetch['first_name'];
$middlenames = $fetch['middle_names'];
$lastname = $fetch['last_name'];
$email = $fetch['user_email'];
$admin = $fetch['admin'];
$regdate = $fetch['user_registered'];
}

?>

<h1>Welcome to MagicPage Admin</h1>

<table border="1">
<tr>
<td>Logged in as:</td>
<td><?php echo $firstname . " " . $middlenames . " " . $lastname; ?></td>
</tr>
<tr>
<td>Account registered on:</td>
<td><?php echo $regdate; ?></td>
</tr>
</table>