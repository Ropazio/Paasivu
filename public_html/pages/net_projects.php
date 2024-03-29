<?php
    require_once __DIR__ . "/../constructor.php";
    require_once get_be("general_functionalities.php");
?>

<!DOCTYPE html>
<html>
<?php
    load_head_and_page_theme("Ropaz – Verkkoprojektit"); 
?>
<body>
        
    <?php
        load_header();
    ?>

    <div class="bottom">

        <?php
            require_once "integration/navi.php";
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
            <p class="text"><a class="links" href="/Pekkaspaivat/index.php" target="_blank">Tästä linkistä pääset tutustumaan Pekkaspäiviin!</a></p>

            <h3 class="text_headline" id="nettikasvio">Nettikasvio</h3>
            <p class="text">Nettikasvio on nimensä mukaisesti kasvio, joka tulee sisältämään kuvat ja nimet Suomen kauniista luonnosta löytyvistä yleisimmistä kasveista. Sivuston tarkoituksena on autaa luonnossa kulkijaa lajintunnistuksessa, mutta tällä hetkellä sivusto on kuitenkin vasta materiaalinkeruuvaiheessa.
            <br>&emsp;
            Tällä hetkellä työn alla on hakutulosten rajausominaisuus, joka perustuu kukan väriin ja kasvityyppiin (puu, pensas, kukka, heinä tms...). Sivulle tulee myös pääkohtia lajintunnistukseen liittyen, kunhan saan itse opiskeltua lisää kasveista.
            <br>&emsp;
            Sivusto on kuitenkin vielä työn alla ja vain pääsivu toimii, mutta olen aloittanut kuitenkin alasivujen tekemisen.
            </p>
            <p class="text"><a class="links" href="/Nettikasvio/index.php" target="_blank">Tästä linkistä pääset tutustumaan Nettikasvioon!</a></p>

            <h3 class="text_headline" id="joulutoivelista">Joulutoivelista</h3>
            <p class="text">Joulutoivelistasta tulee sivusto, jonne voi luoda ryhmiä, joiden jäsenet näkevät toistensa joulutoivelistan. Kunkin aulan jäsenet voivat yliviivata toistensa listoista ilmoittaakseen muille, että on tietyn lahjatoiveen jo varannut eli, jos joku aikoo toteuttaa tietyn lahjatoiveen. Tämä tapahtuu kuitenkin siten ettei lahjan saaja tätä saa selville. Ajattelin, että ryhmään voisi liittyä esimerkiksi uniikin ryhmäkoodin avulla - joku esimerkiksi jakaisi ryhmän kooodinimen ja vain nimen tietävät voivat liittyä (vrt. Kahoot).
            <br>&emsp;
            Sivuston tarkoitus on helpottaa joulutoivelistojen jakamista esimerkiksi perheen kesken, mutta sivu on kuitenkin vielä työn alla. Tämän sivun aion tehdä React-frameworkia käyttäen.
            </p>
            <p class="text"><a class="links" href="/Toivelista/index.php" target="_blank"></a></p>
        </div>
    </div>
    <?php
        load_footer();
    ?>
<script type="text/javascript" src="../js/scripts.js"></script>
<script>
    load_weekdays();
</script>
</body>
</html>