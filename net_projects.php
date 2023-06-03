<!DOCTYPE html>
<html>
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

            <div>
                <h2 class="main_text_headline">Heipä hei ja tervetuloa katsomaan verkkoprojektejani!</h2>
                <p class="text">Projektini on listattu pienen kuvauksen kera alle. Linkit sivulle löytyvät projektin yhteydestä!</p>
            </div>

            <h3 class="text_headline" id="pekkaspaivat">Pekkaspäivät</h3>
            <p class="text">Pekkaspäivät-sivusto on tarkoitettu pörriäishavaintojen tallentamiseen ja seuraamiseen. Tällä hetkellä sivustolle voi lisätä ja poistaa päiväkirjamerkintöjä havainnoista, mutta tulevaisuudessa sivustolle tulee myös jonkinlainen matemaattinen esitystapa havainnoille, jos havaintoja on tarpeeksi monta. Ajattelin, että kuvaaja olisi sopiva tapa havainnoistaa pörriäisten saapumis- ja lähtemisaikaa, ja kokonaisaikaa voisi kuvata esimerkiksi Gaussin jakauman avulla.
            <br>&emsp;
            Pekkaspäiviä voi käydä testaamassa testitunnuksilla (tunnus: Testi, ss: Testi). Kullekin "oikealle" käyttäjälle on kuitenkin luotu omat tunnukset, jotta kirjatuminen näyttää vain omat havainnot!
            </p>
            <p class="text"><a class="links" href="https://ropaz.dev/Pekkaspaivat/index.php" target="_blank">Tästä linkistä pääset tutustumaan Pekkaspäiviin!</a></p>

            <h3 class="text_headline" id="nettikasvio">Nettikasvio</h3>
            <p class="text">Nettikasvio on nimensä mukaisesti kasvio, joka tulee sisältämään kuvat ja nimet Suomen kauniista luonnosta löytyvistä yleisimmistä kasveista. Sivuston tarkoituksena on autaa luonnossa kulkijaa lajintunnistuksessa, mutta tällä hetkellä sivusto on kuitenkin vasta materiaalinkeruuvaiheessa.
            <br>&emsp;
            Kunhan materiaali on kerätty ja kuvat lisätty sivustolle, kasvioon tulee jonkinlainen kukan/kasvin väriin perustuva rajausominaisuus. Nettikasvioon tulee myös sellainen ominaisuus, että tunnuksen luoneet voivat lisätä materiaalia sivustolle. Ehkä sivulle tulee myös jonkinlainen kooste lajintunnistuksesta.
            </p>
            <p class="text"><a class="links" href="https://ropaz.dev/Nettikasvio/index.php" target="_blank">Tästä linkistä pääset tutustumaan Nettikasvioon!</a></p>
        </div>

    </div>
<script type="text/javascript" src="scripts.js"></script>
<script>
    load_weekdays()
</script>
</body>
</html>