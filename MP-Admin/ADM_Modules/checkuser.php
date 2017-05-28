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

      setcookie("mplogin", "true");
setcookie("mpuser", $username);

    $userid = $row['ID'];
    $selector = genRandomBase64(12);
    $validator = genRandomBase64(128);

    $hashedvalidator = hash('sha256', $validator);

    if ( $remember == "true" ) {
        $expiry = time() + 2592000; # Remember for 30 days
        setcookie("mpauth", rawurlencode($selector . ":" . $validator), $expiry);
    } else {
        $expiry = time() + 86400; # Force the user to log out if the session lasts over 24 hours
        setcookie("mpauth", rawurlencode($selector . ":" . $validator));
    }


    $query = "INSERT INTO " . $dbprefix . "auth (selector, hashedValidator, userid, expires) VALUES ('" . $selector . "', '" . $hashedvalidator . "', '" . $userid . "', '" . $expiry . "')";

    echo $query;
    $con->query($query);


}
}

?>
<h1>Processing</h1>

<meta http-equiv="refresh" content="1; url=/?adm=go" />