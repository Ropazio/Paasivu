<?php
require_once "../../constructor.php";
require_once get_be("database.php");

$ID = $_GET['note_ID'];
$ID = (int)$ID;

delete_note($ID);

// Back to the front page
header("Location: ../calendar.php");

?>