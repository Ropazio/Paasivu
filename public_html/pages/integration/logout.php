<?php
require_once dirname(__DIR__) . "/../constructor.php";
require_once get_be("logout_be.php");

logout();
header ("Location: ../../index.php");

?>