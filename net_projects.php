<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main_page_styles.css" />
    <title>Ropaz – Projektit</title>
</head>
<body>

    <?php
        require_once "header.php";
    ?>

    <div class="bottom">
        <div class="desc">

            <div>
                <h2 class="text_headline">Heipä hei ja tervetuloa katsomaan verkkoprojektejani!</h2>
                <p class="text">Projektini on listattu pienen kuvauksen kera alle. Linkit sivulle löytyvät projektin yhteydestä!</p>
            </div>

            <h3 class="text_headline" id="pekkaspaivat">Pekkaspäivät</h3>
            <p class="text"><a class="links" href="https://ropaz.dev/Pekkaspaivat/index.php" target="_blank">Tästä linkistä pääset tutustumaan Pekkaspäiviin!</a></p>

            <h3 class="text_headline" id="nettikasvio">Nettikasvio</h3>
            <p class="text"><a class="links" href="https://ropaz.dev/Nettikasvio/index.php" target="_blank">Tästä linkistä pääset tutustumaan Nettikasvioon!</a></p>
        </div>

        <?php
            require_once "navi.php";
        ?>

    </div>
<script type="text/javascript" src="scripts.js"></script>
</body>
</html>