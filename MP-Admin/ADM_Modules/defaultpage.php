<?php 

global $loggedinuser;

$query = "SELECT first_name, middle_names, last_name, user_login, user_pass, user_email, user_registered FROM " . $dbprefix . "users WHERE user_login='" . $loggedinuser . "'";

$result = $con->query($query);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$firstname = $row['first_name'];
$middlenames = $row['middle_names'];
$lastname = $row['last_name'];
$email = $row['user_email'];
$admin = $row['admin'];
$regdate = $row['user_registered'];
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