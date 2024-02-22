<?php
    require_once __DIR__ . "/../constructor.php";
    require_once get_be("general_functionalities.php");
    require_once get_be("hobby_projects_be.php");
?>

<!DOCTYPE html>
<html>

<?php
    load_head_and_page_theme("Ropaz – Projektit");
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
            <h2 class="main_text_headline">Askarteluja</h2>
            <p class="text">Tänne lisäilen kuvia askarteluistani, joihin lukeutuu paljon virkkaustöitä ja jonkin verran puutöitä sekä satunnaisia muita projekteja. Valitettavasti en ole vielä optimoinut kuvien lataamista, joten ensimmäinen vierailukerta sivulla on suunnatonta tuskaa!
            </p>

            <h3 class="text_headline" id="crochet">Virkatut hahmot</h3>
            <p class="text">Hahmojen virkkaaminen on ollut varsin antoisaa hommaa yksityskohtiensa vuoksi. Tässäpä lista hahmoista kuvineen, mitä olen saanut tuherrettua tähän mennessä (Suunnitteilla on tehdä seuraavaksi Kim Kitsuragi Disco Elysiumista!):
            <ol class="items">
                <?php
                    global $character_projects;
                    for ($i = 0; $i < count($character_projects); $i++) {
                        add_project_in_list($character_projects, $i);
                    }
                ?>
            </ol>
            <br>&emsp;
            </p>

            <div class="image_area">
                <?php
                    global $character_projects;
                    for ($i = 0; $i < count($character_projects); $i++) {
                        add_project_image($character_projects, $i);
                    }
                ?>
            </div>


            <h3 class="text_headline" id="textile">Tekstiilityöt</h3>
            <p class="text">Joitain tekstiilitöitä:
            <ol class="items">
                <?php
                    global $textile_projects;
                    for ($i = 0; $i < count($textile_projects); $i++) {
                        add_project_in_list($textile_projects, $i);
                    }
                ?>
            </ol>
            </p>

            <div class="image_area">
                <?php
                    global $textile_projects;
                    for ($i = 0; $i < count($textile_projects); $i++) {
                        add_project_image($textile_projects, $i);
                    }
                ?>
            </div>


            <h3 class="text_headline" id="tech">Tekniset työt</h3>
            <p class="text">Joitain teknisiä töitä:
            <ol class="items">
                <?php
                    global $technical_projects;
                    for ($i = 0; $i < count($technical_projects); $i++) {
                        add_project_in_list($technical_projects, $i);
                    }
                ?>
            </ol>
            </p>

            <div class="image_area">
                <?php
                    global $technical_projects;
                    for ($i = 0; $i < count($technical_projects); $i++) {
                        add_project_image($technical_projects, $i);
                    }
                ?>
            </div>
            

            <h3 class="text_headline" id="other">Muut käsityöt</h3>
            <p class="text">Muita paskarteluja:
            <ol class="items">
                <?php
                    global $other_projects;
                    for ($i = 0; $i < count($other_projects); $i++) {
                        add_project_in_list($other_projects, $i);
                    }
                ?>
            </ol>
            </p>

            <div class="image_area">
                <?php
                    global $other_projects;
                    for ($i = 0; $i < count($other_projects); $i++) {
                        add_project_image($other_projects, $i);
                    }
                ?>
            </div>
        </div>

        <!-- Background for the image enlargement  -->
        <div id="enlarged_image_view" onclick="close_image()">
            <div id="image_background"></div>
            <div id="enlarged_image_container">
                <img id="enlarged_image" src="" />
            </div>
        </div>
    </div>
<script type="text/javascript" src="../js/scripts.js"></script>
</body>
</html>