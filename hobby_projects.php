<!DOCTYPE html>
<html>
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
                <li class="ordered_list_item">
                    Geralt of Rivia, The Witcher 1 -pelin mukaan
                </li>
                <li class="ordered_list_item">
                    Geralt of Rivia, The Witcher -sarjan mukaan (En tosin pidä henkilökohtaisesti sarjasta.)
                </li>
                <li class="ordered_list_item">
                    Morrigan, Dragon Age Origins -pelin mukaan
                </li>
                <li class="ordered_list_item">
                    Ruttotohtori
                </li>
                <li class="ordered_list_item">
                    Haku-lohikäärme, Studio Ghiblin Henkien kätkemä -elokuvasta
                </li>
                <li class="ordered_list_item">
                    Totoro, Studio Ghiblin Naapurini Totoro -elokuvasta
                </li>
                <li class="ordered_list_item">
                    "Caveira", Rainbow six siege -pelistä
                </li>
                <li class="ordered_list_item">
                    Hawke, Dragon Age 2 -pelin mukaan (Hahmon vaatteet eivät ole minun tekemiäni tällä kertaa.)
                </li>
                <li class="ordered_list_item">
                    Baby Yoda, The Mandalorian -sarjasta
                </li>
                <li class="ordered_list_item">
                    Extra: Silmät hammasmallin pariksi goottisarjojen innoittamana!
                </li>
            </ol>
            <br>&emsp;
            </p>

            <div class="image_area">
                <div class="image_container">
                    <img src="projects/Geralt1.jpg" alt="1" class="proj_img" onclick="enlarge_image('projects/Geralt1.jpg')" id="1">
                    <div class="overlay">Geralt of Rivia (#1)</div>
                </div>
                <div class="image_container">
                    <img src="projects/Geralt2.jpg" alt="2" class="proj_img" id="2">
                    <div class="overlay">Geralt of Rivia (#2)</div>
                </div>
                <div class="image_container">
                    <img src="projects/Geralts.jpg" alt="1 ja 2" class="proj_img" id="3">
                    <div class="overlay">Geralttien yhteiskuva</div>
                </div>
                <div class="image_container">
                    <img src="projects/Morrigan.jpg" alt="3" class="proj_img" id="4">
                    <div class="overlay">Morrigan</div>
                </div>
                <div class="image_container">
                    <img src="projects/Doctor2.jpg" alt="4" class="proj_img">
                    <div class="overlay">Ruttotohtori</div>
                </div>
                <div class="image_container">
                    <img src="projects/Doctor1.jpg" alt="4" class="proj_img">
                    <div class="overlay">Ruttotohtori</div>
                </div>
                <div class="image_container">
                    <img src="projects/Caveira.jpg" alt="7" class="proj_img">
                    <div class="overlay">Caveira</div>
                </div>
                <div class="image_container">
                    <img src="projects/Hawke.jpg" alt="8" class="proj_img">
                    <div class="overlay">Hawke</div>
                </div>
                <div class="image_container">
                    <img src="projects/Yoda.jpg" alt="9" class="proj_img">
                    <div class="overlay">Baby Yoda</div>
                </div>
                <div class="image_container">
                    <img src="projects/Yoda2.jpg" alt="9" class="proj_img">
                    <div class="overlay">Baby Yoda ilman viittaa</div>
                </div>
                <div class="image_container">
                    <img src="projects/Eyes.jpg" alt="10" class="proj_img">
                    <div class="overlay">Silmämunat</div>
                </div>
                <div class="image_container">
                    <img src="projects/Totoro.jpg" alt="6" class="proj_img">
                    <div class="overlay">Totoro</div>
                </div>
                <div class="wide_image_container">
                    <img src="projects/Haku.jpg" alt="5" class="wide_img" onclick="enlarge_image('projects/Haku.jpg')">
                    <div class="overlay">Haku</div>
                </div>
            </div>


            <h3 class="text_headline" id="textile">Tekstiilityöt</h3>
            <p class="text">Joitain tekstiilitöitä:
            <ol class="items" start="11">
                <li class="ordered_list_item">
                    Alma
                </li>
                <li class="ordered_list_item">
                    Vauvan joulutossut
                </li>
                <li class="ordered_list_item">
                    Huovutettu kettu
                </li>
                <li class="ordered_list_item">
                    Kerttu
                </li>
                <li class="ordered_list_item">
                    Makramee
                </li>
                <li class="ordered_list_item">
                    T-paita ja yöhousut
                </li>
                <li class="ordered_list_item">
                    Paita
                </li>
            </ol>
            </p>

            <div class="image_area">
                <div class="image_container">
                    <img src="projects/Alma.jpeg" alt="11" class="proj_img">
                    <div class="overlay">Alma</div>
                </div>
                <div class="image_container">
                    <img src="projects/Shoes.jpeg" alt="12" class="proj_img">
                    <div class="overlay">Vauvan joulutossut</div>
                </div>
                <div class="image_container">
                    <img src="projects/Fox.jpg" alt="13" class="proj_img">
                    <div class="overlay">Huovutettu kettu</div>
                </div>
                <div class="image_container">
                    <img src="projects/Kerttu.jpg" alt="14" class="proj_img">
                    <div class="overlay">Kerttu</div>
                </div>
                <div class="image_container">
                    <img src="projects/Makrame.jpg" alt="16" class="proj_img">
                    <div class="overlay">Makramee</div>
                </div>
                <div class="wide_image_container">
                    <img src="projects/Clothes.jpg" alt="15" class="wide_img">
                    <div class="overlay">T-paita ja yöhousut</div>
                </div>
                <div class="wide_image_container">
                    <img src="projects/Shirt.jpg" alt="15" class="wide_img">
                    <div class="overlay">Paita</div>
                </div>
            </div>


            <h3 class="text_headline" id="tech">Tekniset työt</h3>
            <p class="text">Joitain teknisiä töitä:
            <ol class="items" start="17">
                <li class="ordered_list_item">
                    Puukko (Teränä vanhan Moran terä.)
                </li>
                <li class="ordered_list_item">
                    Jouluporo
                </li>
                <li class="ordered_list_item">
                    Geraltin hopeamiekka
                </li>
                <li class="ordered_list_item">
                    Kasvitaso
                </li>
            </ol>
            </p>

            <div class="image_area">
                <div class="image_container">
                    <img src="projects/Puukko1.jpg" alt="17" class="proj_img">
                    <div class="overlay">Puukko</div>
                </div>
                <div class="image_container">
                    <img src="projects/Puukko2.jpg" alt="17" class="proj_img">
                    <div class="overlay">Puukko</div>
                </div>
                <div class="image_container">
                    <img src="projects/Reindeer.jpg" alt="18" class="proj_img">
                    <div class="overlay">Jouluporo</div>
                </div>
                <div class="image_container">
                    <img src="projects/Silver_sword.jpg" alt="19" class="proj_img">
                    <div class="overlay">Geraltin hopeamiekka</div>
                </div>
                <div class="image_container">
                    <img src="projects/Plant_stand.jpg" alt="20" class="proj_img">
                    <div class="overlay">Kasvitaso</div>
                </div>
            </div>
            

            <h3 class="text_headline" id="other">Muut käsityöt</h3>
            <p class="text">Muita paskarteluja:
            <ol class="items" start="21">
                <li class="ordered_list_item">
                    Enderman, Minecraft-pelistä
                </li>
                <li class="ordered_list_item">
                    Pörriäinen, Minecraft-pelistä
                </li>
                <li class="ordered_list_item">
                    Lasinpuhallusta: pingviini, lintu, koristepallo, maljakko x 2
                </li>
                <li class="ordered_list_item">
                    Nuka-Cola Quantum, Fallout-pelissarjasta (Etiketti netistä.)
                </li>
                <li class="ordered_list_item">
                    Normandy SR-2, Mass Effect 2 -pelistä (Nimi puuttuu aluksen kyljestä. Löysin aluksen ja sukkuloiden 3D-mallit täältä: https://www.thingiverse.com/thing:4921765. Tuki omasta päästä.)
                </li>
            </ol>
            </p>

            <div class="image_area">
                <div class="image_container">
                    <img src="projects/Enderman.jpg" alt="21" class="proj_img">
                    <div class="overlay">Enderman</div>
                </div>
                <div class="image_container">
                    <img src="projects/Minecraft.jpg" alt="21 ja 22" class="proj_img">
                    <div class="overlay">Enderman ja pörriäinen</div>
                </div>
                <div class="image_container">
                    <img src="projects/Glassware.jpg" alt="23" class="proj_img">
                    <div class="overlay">Lasinpuhallustöitä</div>
                </div>
                <div class="image_container">
                    <img src="projects/Bottle.jpg" alt="24" class="proj_img">
                    <div class="overlay">Nuka-Cola Quantum</div>
                </div>
                <div class="wide_image_container">
                    <img src="projects/Normandy.jpg" alt="25" class="wide_img">
                    <div class="overlay">Normandy SR-2</div>
                </div>
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