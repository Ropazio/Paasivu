<?php
    require_once "database.php";
    require_once "sessions.php";

    if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
        header ("Location: login_page.php");
    }

    $notes = get_notes($_SESSION['user_ID']);

    function print_daily_notes($day) {
        global $notes;

        if (empty($notes)) {
            echo "<p class='text'>Ei merkintöjä.</p>";
        }
        else {
            $no_notes = True;
            foreach ($notes as $note) {
                if ($note['day'] == $day) {
                    echo "<div class='bullet_container'>";
                    echo    "<ul class='bullet'>";
                    echo        "<li>" . $note['note'] . "<button class='delete_button'><a class='button_link' href='delete_note.php?note_ID=" . $note['note_ID'] . "'><div class='button_image_container'>☠️</div></a></button>" . "</li>";
                    echo    "</ul>";
                    echo "</div>";

                    $no_notes = False;
                }
                else {
                    continue;
                }
            }
            if ($no_notes) {
                echo "<p class='text'>Ei merkintöjä.</p>";
            }
        }
    }

    function print_send_notes($day_number) {
        echo "<form method='POST' action='add_note.php' class='bullet_container'>";
        echo    "<ul class='bullet'>";
        echo        "<li>";
        echo            sprintf("<textarea name='day%u_text' class='text_box'></textarea>", $day_number);
        echo            sprintf("<button type='submit' name='day%u_button' class='send_button'><div class='button_image_container'>🚀</div></button>", $day_number);
        echo        "</li>";
        echo    "</ul>";
        echo "</form>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main_page_styles.css" />
    <title>Ropaz – Joku roti</title>
</head>
<body>

    <?php
        require_once "header.php";
    ?>

    <div class="bottom">

        <?php
            require_once "navi.php";
        ?>

        <div class="desc">
            <h2 class="main_text_headline">Nyt joku roti siihen hommaan!</h2>

            <h2 class="day" id="weekday_error"></h2>

            <h3 class="day" id="weekday1"></h3>
                
                <?php
                    $day1 = date("o-m-d");
                    print_daily_notes($day1);
                ?>
                <?php
                    print_send_notes(1);
                ?>

            <h3 class="day" id="weekday2"></h3>
                <?php
                    $day2 = date("o-m-d", strtotime("+1 day"));
                    print_daily_notes($day2);
                ?>
                <?php
                    print_send_notes(2);
                ?>

            <h3 class="day" id="weekday3"></h3>
                <?php
                    $day3 = date("o-m-d", strtotime("+2 day"));
                    print_daily_notes($day3);
                ?>
                <?php
                    print_send_notes(3);
                ?>

            <h3 class="day" id="weekday4"></h3>
                <?php
                    $day4 = date("o-m-d", strtotime("+3 day"));
                    print_daily_notes($day4);
                ?>
                <?php
                    print_send_notes(4);
                ?>

            <h3 class="day" id="weekday5"></h3>
                <?php
                    $day5 = date("o-m-d", strtotime("+4 day"));
                    print_daily_notes($day5);
                ?>
                <?php
                    print_send_notes(5);
                ?>

            <h3 class="day" id="weekday6"></h3>
                <?php
                    $day6 = date("o-m-d", strtotime("+5 day"));
                    print_daily_notes($day6);
                ?>
                <?php
                    print_send_notes(6);
                ?>

            <h3 class="day" id="weekday7"></h3>
                <?php
                    $day7 = date("o-m-d", strtotime("+6 day"));
                    print_daily_notes($day7);
                ?>
                <?php
                    print_send_notes(7);
                ?>

            </p>
        </div>

    </div>
<script type="text/javascript" src="scripts.js"></script>
</body>
</html>