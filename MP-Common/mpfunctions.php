<?php

/**
 * MagicPage Common Functions Module, Version 0.0.2
 * 2017 Robert Hawdon
 */

function genRandomBase64($length = 12) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function checkAuth() {

    global $con;
    global $dbprefix;

    $authcookie = urldecode($_COOKIE['MPAUTH']);

    $chunk = explode(":", $authcookie);
    $selector = $chunk[0];
    $validator = $chunk[1];
    $hashedvalidator = hash('sha256', $validator);

    $query = "SELECT u.user_login, a.selector, a.hashedValidator, a.expires FROM " . $dbprefix . "users u JOIN " . $dbprefix . "auth a ON u.ID = a.userid WHERE selector = '" . $selector . "'";

    $result = $con->query($query);

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {

            if ($hashedvalidator == $row['hashedValidator'] AND time() < $row['expires']) {
            $_SESSION['username'] = $row['user_login'];
            $_SESSION['authenticated'] = "true";

            $newvalidator = genRandomBase64(128);
            $newhashedvalidator = hash('sha256', $newvalidator);
            setcookie("MPAUTH", rawurlencode($selector . ":" . $newvalidator), $row['expires']);

            $query = "UPDATE " . $dbprefix . "auth SET hashedValidator = '" . $newhashedvalidator . "' WHERE selector = '" . $selector . "'";
            $con->query($query);
            } else {
                setcookie("MPAUTH", "", time() - 3600);
            }

    }
}

?>
