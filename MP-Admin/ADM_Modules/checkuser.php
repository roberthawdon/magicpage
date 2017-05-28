<?php

$username = $_POST['username'];
$password = $_POST['password'];
$remember = $_POST['remember'];

$query = "SELECT * FROM " . $dbprefix . "users WHERE user_login='" . $username . "'";

$result = $con->query($query);



while($row = $result->fetch(PDO::FETCH_ASSOC))
{

if (password_verify(base64_encode(hash('sha384', $password)), $row['user_pass']) AND $row['admin'] == '1') {
    /* HA HA LOL. I LOLZ AT MY PAST SECURITY FLAWZ */

    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['authenticated'] = "true";

      # setcookie("mplogin", "true");
      # setcookie("mpuser", $username);

    $userid = $row['ID'];
    $selector = genRandomBase64(12);
    $validator = genRandomBase64(128);

    $hashedvalidator = hash('sha256', $validator);

    if ( $remember == "true" ) {
        $expiry = time() + 2592000; # Remember for 30 days
        setcookie("MPAUTH", rawurlencode($selector . ":" . $validator), $expiry);
        $query = "INSERT INTO " . $dbprefix . "auth (selector, hashedValidator, userid, expires) VALUES ('" . $selector . "', '" . $hashedvalidator . "', '" . $userid . "', '" . $expiry . "')";

        $con->query($query);
    }



}
}

?>
<h1>Processing</h1>

<meta http-equiv="refresh" content="1; url=/?adm=go" />
