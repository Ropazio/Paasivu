<?php
    require_once __DIR__ . "/../constructor.php";
    require_once get_be("database.php");
    require_once get_be("sessions.php");
    require_once get_be("calendar_be.php");
    require_once get_be("general_functionalities.php");
?>

<!DOCTYPE html>
<html>
<?php
    load_head_and_page_theme("Ropaz – Joku roti"); 
?>
<body>

    <?php
        load_header();
    ?>

    <div class="bottom">

        <?php
            require_once "navi.php";
        ?>

        <div class="desc">
            <h2 class="main_text_headline">Nyt joku roti siihen hommaan!</h2>

            <h2 class="day" id="weekday_error"></h2>

            <div class="sticky_box">
                <h3 class="day" id="sticky_note"></h3>
                
                    <?php
                        $day0 = null;
                        print_daily_notes($day0);
                    ?>
                    <?php
                        print_send_notes(0);
                    ?>
            </div>

            <h4 class="day" id="weekday1"></h4>
                
                <?php
                    $day1 = date("o-m-d");
                    print_daily_notes($day1);
                ?>
                <?php
                    print_send_notes(1);
                ?>

            <h4 class="day" id="weekday2"></h4>
                <?php
                    $day2 = date("o-m-d", strtotime("+1 day"));
                    print_daily_notes($day2);
                ?>
                <?php
                    print_send_notes(2);
                ?>

            <h4 class="day" id="weekday3"></h4>
                <?php
                    $day3 = date("o-m-d", strtotime("+2 day"));
                    print_daily_notes($day3);
                ?>
                <?php
                    print_send_notes(3);
                ?>

            <h4 class="day" id="weekday4"></h4>
                <?php
                    $day4 = date("o-m-d", strtotime("+3 day"));
                    print_daily_notes($day4);
                ?>
                <?php
                    print_send_notes(4);
                ?>

            <h4 class="day" id="weekday5"></h4>
                <?php
                    $day5 = date("o-m-d", strtotime("+4 day"));
                    print_daily_notes($day5);
                ?>
                <?php
                    print_send_notes(5);
                ?>

            <h4 class="day" id="weekday6"></h4>
                <?php
                    $day6 = date("o-m-d", strtotime("+5 day"));
                    print_daily_notes($day6);
                ?>
                <?php
                    print_send_notes(6);
                ?>

            <h4 class="day" id="weekday7"></h4>
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
<script type="text/javascript" src="../js/scripts.js"></script>
<script>
    load_weekdays();
</script>
</body>
</html>