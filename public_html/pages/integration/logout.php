<?php
require_once "../../constructor.php";
require_once get_be("logout_be.php");

logout();
header ("Location: ../../index.php");

?>