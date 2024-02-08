<!DOCTYPE html>
<html>
<?php

/* Projects is an array containing arrays with information on each project:
array (ordinal number: int, project description: str, image source: str, projectwide image: bool )
*/
$character_projects = array (
    array(1, 'Geralt of Rivia, The Witcher 1 -pelin mukaan', [['projects/Geralt1.jpg', false, 'Geralt of Rivia (#1)']]),
    array(2, 'Geralt of Rivia, The Witcher -sarjan mukaan (En tosin pidä henkilökohtaisesti sarjasta.)', [['projects/Geralt2.jpg', false, 'Geralt of Rivia (#2)'], ['projects/Geralts.jpg', false, 'Geralts']]),
    array(3, 'Morrigan, Dragon Age Origins -pelin mukaan', [['projects/Morrigan.jpg', false, 'Morrigan']]),
    array(4, 'Ruttotohtori', [['projects/Doctor1.jpg', false, 'Ruttotohtori'], ['projects/Doctor2.jpg', false, 'Ruttotohtori']]),
    array(5, 'Caveira, Rainbow six siege -pelistä', [['projects/Caveira.jpg', false, 'Caveira']]),
    array(6, 'Totoro, Studio Ghiblin Naapurini Totoro -elokuvasta', [['projects/Totoro.jpg', false, 'Totoro']]),
    array(7, 'Hawke, Dragon Age 2 -pelin mukaan (Hahmon vaatteet eivät ole minun tekemiäni tällä kertaa.)', [['projects/Hawke.jpg', false, 'Hawke']]),
    array(8, 'Baby Yoda, The Mandalorian -sarjasta', [['projects/Yoda.jpg', false, 'Baby Yoda'], ['projects/Yoda2.jpg', false, 'Baby Yoda ilman viittaa']]),
    array(9, 'Silmät hammasmallin pariksi goottisarjojen innoittamana!', [['projects/Eyes.jpg', false, 'Silmämunat']]),
    array(10, 'Haku-lohikäärme, Studio Ghiblin Henkien kätkemä -elokuvasta', [['projects/Haku.jpg', true, 'Haku']])
);

$textile_projects = array (
    array(1, 'Alma', [['projects/Alma.jpeg', false, 'Alma']]),
    array(2, 'Vauvan joulutossut', [['projects/Shoes.jpeg', false, 'Vauvan joulutossut']]),
    array(3, 'Huovutettu kettu', [['projects/Fox.jpg', false, 'Huovutettu kettu']]),
    array(4, 'Kerttu', [['projects/Kerttu.jpg', false, 'Kerttu']]),
    array(5, 'Makramee', [['projects/Makrame.jpg', false, 'Makramee']]),
    array(6, 'T-paita ja yöhousut', [['projects/Clothes.jpg', true, 'T-paita ja yöhousut']]),
    array(7, 'Paita', [['projects/Shirt.jpg', true, 'Paita']])
);

$technical_projects = array (
    array(1, 'Puukko (Teränä vanhan Moran terä.)', [['projects/Puukko1.jpg', false, 'Puukko'], ['projects/Puukko2.jpg', false, 'Puukko']]),
    array(2, 'Jouluporo', [['projects/Reindeer.jpg', false, 'Jouluporo']]),
    array(3, 'Geraltin hopeamiekka', [['projects/Silver_sword.jpg', false, 'Geraltin hopeamiekka']]),
    array(4, 'Kasvitaso', [['projects/Plant_stand.jpg', false, 'Kasvitaso']])
);

$other_projects = array (
    array(1, 'Enderman, Minecraft-pelistä', [['projects/Enderman.jpg', false, 'Enderman']]),
    array(2, 'Pörriäinen, Minecraft-pelistä', [['projects/Minecraft.jpg', false, 'Pörriäinen']]),
    array(3, 'Lasinpuhallusta: pingviini, lintu, koristepallo, maljakko x 2', [['projects/Glassware.jpg', false, 'Lasinpuhallustöitä']]),
    array(4, 'Nuka-Cola Quantum, Fallout-pelissarjasta (Etiketti netistä.)', [['projects/Bottle.jpg', false, 'Nuka-Cola Quantum']]),
    array(5, 'Normandy SR-2, Mass Effect 2 -pelistä (Nimi puuttuu aluksen kyljestä. Löysin aluksen ja sukkuloiden 3D-mallit täältä: https://www.thingiverse.com/thing:4921765. Tuki omasta päästä.)', [['projects/Normandy.jpg', true, 'Normandy SR-2']])
);


function add_project_in_list($projects, $project_ordinal) {
    echo "<li class='ordered_list_item'>";
    echo    $projects[$project_ordinal][1];
    echo "</li>";
}

function add_project_image($projects, $project_ordinal) {
    $image_list = $projects[$project_ordinal][2];
    for ($i = 0; $i < count($image_list); $i++) {
        if ($image_list[$i][1] == false) {
            $name_class_container = 'image_container';
            $name_class_image = 'proj_img';
        } else {
            $name_class_container = 'wide_image_container';
            $name_class_image = 'wide_img';
        }

        echo "<div class=" . $name_class_container . ">";
        echo    "<img src=" . $image_list[$i][0]
                . " class=" . $name_class_image
                . " onclick='enlarge_image(" . $image_list[$i][0] . ")'>";
        echo    "<div class='overlay'>" . $image_list[$i][2] . "</div>";
        echo "</div>";
    }
}

?>

<?php
    require_once "general_page_and_styles.php";
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
<script type="text/javascript" src="scripts.js"></script>
</body>
</html>