<?php

$expectedconf = '../config.php';

if (file_exists($expectedconf)) {
    include("firstrun/Econfalreadyexists.php");
} else {
    include("firstrun/setup1.php");
}
?>
