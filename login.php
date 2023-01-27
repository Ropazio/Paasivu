<?php
require_once "database.php";

function login($username, $password) : bool {

    echo "Trying to login with username '" . $username . "' and password '" . $password ."'";
 
    // Check if username and password are found in the database. If not, return to the login page. If the username or password don't match, return to the login page.
    $ID = check_login($username, $password);
    if (empty($ID)) {
        header("Location: login.php");
        return false;
    }

    // If everything is ok, continue to the calendar.
    $_SESSION['logged_in'] = true;
    $_SESSION['logged_in'] = $ID;
    header ("Location: calendar.php");
    return true;
}

$username = $_POST['username'];
$password = $_POST['password'];

login($username , $password);

?>