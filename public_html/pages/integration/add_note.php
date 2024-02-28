<?php
require_once "../../constructor.php";
require_once get_be("database.php");

// Add note

$day = False;
$note = False;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['day0_button'])) {
        $day = null;
        $note = $_POST['day0_text'];

    } else if (isset($_POST['day1_button'])) {
        $day = date("o-m-d");
        $note = $_POST['day1_text'];

    } else if (isset($_POST['day2_button'])) {
        $day = date("o-m-d", strtotime("+1 day"));
        $note = $_POST['day2_text'];

    } else if (isset($_POST['day3_button'])) {
        $day = date("o-m-d", strtotime("+2 day"));
        $note = $_POST['day3_text'];

    } else if (isset($_POST['day4_button'])) {
        $day = date("o-m-d", strtotime("+3 day"));
        $note = $_POST['day4_text'];

    } else if (isset($_POST['day5_button'])) {
        $day = date("o-m-d", strtotime("+4 day"));
        $note = $_POST['day5_text'];

    } else if (isset($_POST['day6_button'])) {
        $day = date("o-m-d", strtotime("+5 day"));
        $note = $_POST['day6_text'];

    } else if (isset($_POST['day7_button'])) {
        $day = date("o-m-d", strtotime("+6 day"));
        $note = $_POST['day7_text'];

    }
}
if (!$note) {
    echo "An error occurred in saving the note :(";
} else {
    add_note($day, $note);
}


// Back to the front page
header("Location: ../calendar.php");

?>