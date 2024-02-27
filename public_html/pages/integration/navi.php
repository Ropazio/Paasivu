<?php
    require_once get_be("sessions.php");
    require_once get_be("navi_be.php");

?>

<div class="navi">
    <div class="navi_bar">
        <div class="navi_menu_icon" onclick="activate_mobile_navi()">
            <i>
                <div class="icon"></div>
                <div class="icon"></div>
                <div class="icon"></div>
            </i>
        </div>
    </div>

    <div class="headline_container" id="navi_headlines">
        <h1>
            <a class="main_headline" href="front_page.php">Etusivu</a>
        </h1>

        <h2>
            <a class="headlines" href="net_projects.php">Verkkoprojektit</a>
        </h2>

        <div class="content pages">
            <li class="bullet">
                <a class="headlines" href="net_projects.php#pekkaspaivat">Pekkaspäivät</a>
            </li>

            <li class="bullet">
                <a class="headlines" href="net_projects.php#nettikasvio">Nettikasvio</a>
            </li>

            <li class="bullet">
                <a class="headlines" href="net_projects.php#joulutoivelista">Joulutoivelista</a>
            </li>
        </div>


        <h2>
            <a class="headlines" href="hobby_projects.php">Askarteluprojektit</a>
        </h2>

        <div class="content projects">
            <li class="bullet">
                <a class="headlines" href="hobby_projects.php#crochet">Virkatut hahmot </a>
            </li>

            <li class="bullet">
                <a class="headlines" href="hobby_projects.php#textile">Tekstiilityöt</a>
            </li>

            <li class="bullet">
                <a class="headlines" href="hobby_projects.php#tech">Tekniset työt</a>
            </li>

            <li class="bullet">
                <a class="headlines" href="hobby_projects.php#other">Muut käsityöt</a>
            </li>
        </div>

        <h2>
            <a class="headlines function" href="calendar.php">Elämänhallinta</a>
        </h2>

        <?php
            show_login_information();
        ?>
    </div>
</div>