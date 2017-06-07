<?php

$expectedconf = '../config.php';

session_start();

if(isset($_POST['dbsoftware'])) {
    $_SESSION['dbsoftware'] = $_POST['dbsoftware'];
    $_SESSION['dbhost'] = $_POST['dbhost'];
    $_SESSION['dbuser'] = $_POST['dbuser'];
    $_SESSION['dbpassword'] = $_POST['dbpassword'];
    $_SESSION['dbdatabase'] = $_POST['dbdatabase'];
    $_SESSION['dbprefix'] = $_POST['dbprefix'];
}


function applyconfig() {
    global $expectedconf;
    $host = $_SERVER['HTTP_HOST'];
    if( isset($_SERVER['HTTPS'] ) ) {
        $prot = 'https://';
    } else {
        $prot = 'http://';
    }
    $content = "<?php

/** Database Config */

\$dbhost = '" . $_SESSION['dbhost'] . "'; # The hostname or IP of your database server
\$dbuser = '". $_SESSION['dbuser'] . "'; # The user of your database
\$dbpassword = '" . $_SESSION['dbpassword'] . "'; # The password for your database user
\$dbdatabase = '" . $_SESSION['dbdatabase'] . "'; # The database MagicPage will use
\$dbprefix = '" . $_SESSION['dbprefix'] . "'; # A prefix for your tables (not fully implemented)

/** Folder Config */

\$pathfolder = '" . $_POST['mppath'] . "'; # The directory path for MagicPage
\$themes = '" . $_POST['mpthemes'] . "'; # Themes directory
\$common = '" . $_POST['mpcommon'] . "'; # Common directory

?>";

    file_put_contents($expectedconf, $content);
    header('Location: ' . $prot . $host . '/');
    exit();
}

function firstrun() {
    if ($_POST["completed"] == "1") {
        include("firstrun/setup2.php");
    } elseif ($_POST["completed"] == "2") {
        applyconfig();
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
