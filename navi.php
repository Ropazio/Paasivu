<?php
require_once "sessions.php";

function show_login_information() {
    if (!(isset($_SESSION['logged_in']))) {
        return;
    } elseif ($_SESSION['logged_in'] = true) {
        $name = $_SESSION['username'];
        $greetings = sprintf("Kirjaudu ulos tililtä %s", $name);
        echo "<div id='login_info_box'>";
        echo    "<a id='login_info' href='/Paasivu/logout.php'>" . $greetings . "</a>";
        echo "</div>";
    return;
    }
}
?>

<div class="navi">
    <div class="navi_menu_icon" onclick="activate_mobile_navi()">
        <i>
            <div class="icon"></div>
            <div class="icon"></div>
            <div class="icon"></div>
        </i>
    </div>

    <div class="headline_container" id="navi_headlines">
        <h1>
            <a class="main_headline" href="/Paasivu">Etusivu</a>
        </h1>

        <h2>
            <a class="headlines" href="/Paasivu/net_projects.php">Verkkoprojektit</a>
        </h2>

        <div class="content pages">
            <li class="bullet">
                <a class="headlines" href="/Paasivu/net_projects.php#pekkaspaivat">Pekkaspäivät</a>
            </li>

            <li class="bullet">
                <a class="headlines" href="/Paasivu/net_projects.php#nettikasvio">Nettikasvio</a>
            </li>

            <li class="bullet">
                <a class="headlines" href="/Paasivu/net_projects.php#joulutoivelista">Joulutoivelista</a>
            </li>
        </div>


        <h2>
            <a class="headlines" href="/Paasivu/hobby_projects.php">Askarteluprojektit</a>
        </h2>

        <div class="content projects">
            <li class="bullet">
                <a class="headlines" href="/Paasivu/hobby_projects.php#crochet">Virkatut hahmot </a>
            </li>

            <li class="bullet">
                <a class="headlines" href="/Paasivu/hobby_projects.php#textile">Tekstiilityöt</a>
            </li>

            <li class="bullet">
                <a class="headlines" href="/Paasivu/hobby_projects.php#tech">Tekniset työt</a>
            </li>

            <li class="bullet">
                <a class="headlines" href="/Paasivu/hobby_projects.php#other">Muut käsityöt</a>
            </li>
        </div>

        <h2>
            <a class="headlines function" href="/Paasivu/calendar.php">Elämänhallinta</a>
        </h2>

        <?php
        show_login_information();
        ?>
    </div>
</div>