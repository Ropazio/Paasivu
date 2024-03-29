<?php
    require_once __DIR__ . "/../constructor.php";
    require_once get_be("general_functionalities.php");
?>

<!DOCTYPE html>
<html>
<?php
    load_head_and_page_theme("Ropaz – Päänäkymä");
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
            <h2 class="text_headline">Tervetuloa Ropaz.dev:in pääsivulle!</h2>
            <p class="text">Tämä sivusto toimii niin sanottuna telakkana harrastuksiini liittyen; täältä voit löytää muun muassa linkit kuvauksineen joillekin muille verkkosivuilleni sekä kuvia ja peräti tekstiä joihinkin askarteluprojekteihini liittyen.
            <br>&emsp;
            Olen tehnyt sivulle myös "elämänhallinnaksi" kutsutun osion, joka sisältää sekä yleisen muistion sekä muistiot seuraavalle seitsemälle päivälle. Tämä ominaisuus kuitenkin vaatii kirjautumisen.
            <br>&emsp;
            Tällä hetkellä lähinnä pohdiskelen mitä muuta voisin sivustolle ladata...
            </p>
        </div>

    </div>
    <?php
        load_footer();
    ?>
<script type="text/javascript" src="../js/scripts.js"></script>
</body>
</html>