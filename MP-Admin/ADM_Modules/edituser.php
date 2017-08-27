<?php

global $authuser;

$user = $_GET['user'];
$new = $_GET['new'];

$query = "SELECT ID, first_name, middle_names, last_name, user_login, user_email, admin, user_registered FROM " . $dbprefix . "users WHERE user_login='" . $user . "' ORDER BY ID ASC"; 
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

<?php
if ($new == "true") {
echo "<h1>Add a new user</h1>";
} else {
echo "<h1>Editing user information for &quot;" . $firstname . " " . $lastname ."&quot;</h1>

<p>This account was registered: " . $regdate . "</p>";
}
?>



<form action="/?adm=go&action=applyuser" method="post">
<input type="hidden" name="user" value="<?php echo $user;?>" />
<input type="hidden" name="regdate" value="<?php echo $regdate;?>" />
<table border="1">
<tr>
<td>Username</td>
<td><?php if ($new == "true") {
echo "<input type=\"text\" name=\"username\" value=\"\" />
</td>
<td>&nbsp;</td>";
} else {
echo $user . "
</td>
<td>Username cannot be changed</td>";
}
?>
</tr>
<?php if ($new != "true" && $authuser == $user) {
echo "<tr>
<td>Current Password</td>
<td><input type=\"password\" name=\"currentpassword\" value=\"\" /></td>
<td>Required only if you're changing your password.</td>
</tr>";
}
?>
<tr>
<td><?php if ($new != "true") { echo "New"; } ?> Password</td>
<td><input type="password" name="password1" value="" /></td>
<td rowspan="2"><p>We don't place restrictions on passwords, but we recommend the following:</p>
    <ul>
    <li>Should be <strong>no shorter than</strong> 8 characters. - There is no upper limit restriction.</li>
<li>Should contain <strong>at least</strong> a mixture of upper and lower case charaters, numbers, and symbols. - MagicPage supports the full unicode character set.</li>
<li>Should not be the same password used on other online accounts. - We're confident the MagicPage password storage system is secure, we can't vouch for other services, so sharing passwords should be avoided.</li>
<li>We recommend the use of a password manager to generate and store strong passwords.</li>
</ul></td>
</tr>
<tr>
<td>Retype <?php if ($new != "true") { echo "New"; } ?> Password</td>
<td><input type="password" name="password2" value="" /></td>
</tr>
<tr>
<td>First Name</td>
<td><input type="text" name="firstname" value="<?php echo $firstname; ?>" /></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Middle Name(s)</td>
<td><input type="text" name="middlenames" value="<?php echo $middlenames; ?>" /></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Last Name</td>
<td><input type="text" name="lastname" value="<?php echo $lastname; ?>" /></td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Email address</td>
<td><input type="text" name="email" value="<?php echo $email; ?>" /></td>
<td>Reserved for future use</td>
</tr>
<tr>
<td>PGP</td>
<td><input type="checkbox" name="admin" value="0" />Enable PGP</td>
<td>Reserved for future use</td>
</tr>
<tr>
<td>Public Key</td>
<td><input type="text" name="pgppublic" value="" /></td>
<td>Reserved for future use</td>
</tr>
<tr>
<td>Admin</td>
<td><input type="checkbox" name="admin" value="1" <?php if ($admin == "1") { echo "checked"; } ?>/>Enable Admin</td>
<td>This option is reserved for future use<br />
<strong>Important: Mark as checked for now, or else you won't be able to log into the admin panel!</strong></td>
</tr>
</table>
<input type="hidden" name="type" value="<?php if ($new == "true") { echo "new"; } else { echo "edit"; } ?>" />
<button value="submit">Submit</button>
<?php if ($new != "true") { echo "<button name=\"delete\" value=\"true\">Delete</button>"; } ?>
</form>

