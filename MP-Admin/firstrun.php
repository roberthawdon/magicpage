<?php

$expectedconf = '../config.php';

function firstrun() {
    if ($_POST["completed"] == "1") {
        include("firstrun/setup2.php");
    } else {
        include("firstrun/setup1.php");
    }
}

if (file_exists($expectedconf)) {
    include("firstrun/Econfalreadyexists.php");
} else {
    firstrun();
}
?>
