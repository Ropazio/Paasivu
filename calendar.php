<?php
    require_once "database.php";
    require_once "sessions.php";

    if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
        header ("Location: login_page.php");
    }

    $notes = get_notes($_SESSION['user_ID']);
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

                    if (empty($notes)) {
                        echo "<p class='text'>Ei merkintöjä.</p>";
                    }
                    else {

                        foreach ($notes as $note) {
                            if ($note['day'] == date("o-m-d")) {
                                echo "<p class='text'>" . $note['note'] . "</p>";
                            }
                            else {
                                echo "<p class='text'>Ei merkintöjä.</p>";
                            }

                        }
                    }

                ?>
                <textarea class="text_box"></textarea>
            <h3 class="day" id="weekday2"></h3>
                <textarea class="text_box"></textarea>
            <h3 class="day" id="weekday3"></h3>
                <textarea class="text_box"></textarea>
            <h3 class="day" id="weekday4"></h3>
                <textarea class="text_box"></textarea>
            <h3 class="day" id="weekday5"></h3>
                <textarea class="text_box"></textarea>
            <h3 class="day" id="weekday6"></h3>
                <textarea class="text_box"></textarea>
            <h3 class="day" id="weekday7"></h3>
                <textarea class="text_box"></textarea>

            </p>
        </div>

    </div>
<script type="text/javascript" src="scripts.js"></script>
</body>
</html>