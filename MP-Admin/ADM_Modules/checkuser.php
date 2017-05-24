<?php

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM " . $dbprefix . "users WHERE user_login='" . $username . "'";

$result = $con->query($query);



while($row = $result->fetch(PDO::FETCH_ASSOC))
{
$regdate = $row['user_registered'];
$saltedpassword = md5($username . $regdate . $password);

if ($row['user_login'] == $username AND $row['user_pass'] == $saltedpassword AND $row['admin'] == '1') {
setcookie("mplogin", "true");
setcookie("mpuser", $username);
}
}



?>
<h1>Processing</h1>

<meta http-equiv="refresh" content="1; url=/?adm=go" />