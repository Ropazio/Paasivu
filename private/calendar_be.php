<?php

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
                    echo        "<li>" . $note['note'] . "<button class='delete_button'><a class='button_link' href='integration/delete_note.php?note_ID=" . $note['note_ID'] . "'><div class='button_image_container'>☠️</div></a></button>" . "</li>";
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
        echo "<form method='POST' action='integration/add_note.php' class='bullet_container'>";
        echo    "<ul class='bullet'>";
        echo        "<li>";
        echo            sprintf("<textarea name='day%u_text' class='text_box'></textarea>", $day_number);
        echo            sprintf("<button type='submit' name='day%u_button' class='send_button'><div class='button_image_container'>🚀</div></button>", $day_number);
        echo        "</li>";
        echo    "</ul>";
        echo "</form>";
    }
?>