<?php
require_once dirname(__DIR__) . "/../constructor.php";
require_once get_be("login_be.php");

$username = $_POST['username'];
$password = $_POST['password'];

$login_successful = login($username , $password);
if ($login_successful == True) {
	header ("Location: ../calendar.php");
} else {
	header("Location: ../login_page.php?error=login_failed");
}
?>