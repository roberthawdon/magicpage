<?php

global $authuser;

$user = $_POST['user'];

$query = "SELECT user_login, user_pass FROM " . $dbprefix . "users WHERE user_login='" . $user . "'";
$result = $con->query($query);

while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $fetchpass = $row['user_pass'];
}

$newdate = date('Y-m-d H:i:s');
$delete = $_POST['delete'];
$oldpass = $_POST['currentpassword'];
$newpass1 = $_POST['password1'];
$newpass2 = $_POST['password2'];
$firstname = $_POST['firstname'];
$middlenames = $_POST['middlenames'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$regdate = $_POST['regdate'];
$admin = $_POST['admin'];
if ($admin != "1") {
    $admin = "0";
}
$type = $_POST['type'];

if ($type == "new") {
    $newusername = $_POST['username'];
}

if ($type == "edit") {

    if ($delete == "true") {

        $query = "DELETE FROM " . $dbprefix ."users WHERE user_login='" . $user . "'";

        $con->query($query);

        echo "<h1>Deleting user...</h1>
<meta http-equiv=\"refresh\" content=\"1; url=/?adm=go&action=usersettings\" />";

    }

    if ($newpass1 != "") {
        if (password_verify(base64_encode(hash('sha384', $oldpass)), $fetchpass) || $authuser != $user) {
            if ($newpass1 == $newpass2) {

                $saltedpass = password_hash(base64_encode(hash('sha384', $newpass1)), PASSWORD_DEFAULT);

                $query = "UPDATE " . $dbprefix . "users SET first_name='" . $firstname . "', middle_names='" . $middlenames . "', last_name='" . $lastname . "', user_pass='" . $saltedpass . "', user_email='" . $email . "', admin='" . $admin . "'  WHERE user_login='" . $user . "'";

                $con->query($query);

                echo "<h1>Updating...</h1>
<meta http-equiv=\"refresh\" content=\"1; url=/?adm=go&action=edituser&user=" . $user . "\" />";

            } else {

                echo "<p>The new password you specified wasn't entered correctly in both boxes</p>";

            }

        } else {

            echo "<p>The password you specified was incorrect</p>";

        }

    } else {

        $query = "UPDATE " . $dbprefix . "users SET first_name='" . $firstname . "', middle_names='" . $middlenames . "', last_name='" . $lastname . "', user_email='" . $email . "', admin='" . $admin . "'  WHERE user_login='" . $user . "'";

        $con->query($query);

        echo "<h1>Updating...</h1>
<meta http-equiv=\"refresh\" content=\"1; url=/?adm=go&action=edituser&user=" . $user . "\" />";

    }

} elseif ($type == "new") {
    if ($newpass1 == $newpass2) {


        $saltedpass = password_hash(base64_encode(hash('sha384', $newpass1)), PASSWORD_DEFAULT);

        $query = "INSERT INTO " . $dbprefix . "users (first_name, middle_names, last_name, user_login, user_pass, user_email, admin, user_registered) VALUES ('" . $firstname . "', '" . $middlenames . "', '" . $lastname . "', '" . $newusername . "', '" . $saltedpass . "', '" . $email . "', '" . $admin . "', '" . $newdate . "');";

        $result = $con->query($query);

        if ( $result == true ) {
            echo "<h1>Adding New User...</h1>
<meta http-equiv=\"refresh\" content=\"1; url=/?adm=go&action=edituser&user=" . $newusername . "\" />";
        } else {
            if ( $con->errorCode() == 1062 ) { // if this error number is the duplicate error, handle it.
                print "A user with the unique name " . $username . " already exists! Press \"back\" in your browser and change this element.";
            } else {
                die( "Error in this query: " . $con->errorInfo()[2] . " " . $insert );
            }
        }





    } else {
        echo "<p>The new password you specified wasn't entered correctly in both boxes</p>";
    }
}

?>
