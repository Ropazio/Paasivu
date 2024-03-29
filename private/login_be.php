<?php
require_once "database.php";

function login($username, $password) : bool {

    // Check if username and password are found in the database. If not, return to the login page. If the username or password don't match, return to the login page.
    $ID = check_login($username, $password);
    if (empty($ID)) {
        return false;
    }

    // If everything is ok, continue to the calendar.
    $_SESSION['logged_in'] = true;
    $_SESSION['user_ID'] = $ID;
    $_SESSION['username'] = $username;
    return true;
}

?>