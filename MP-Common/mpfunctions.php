<?php

/**
 * MagicPage Common Functions Module, Version 0.0.1
 * 2017 Robert Hawdon
 */

function generateSalt($length = 12) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function hashPassword($password, $salt, $sitesalt="") {
    $combined = $password . $salt . $sitesalt;
    $hashed = hash('sha256', $combined);
    return $hashed;
}

?>
