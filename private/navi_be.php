<?php

function show_login_information() {
    if (!(isset($_SESSION['logged_in']))) {
        return;
    } elseif ($_SESSION['logged_in'] = true) {
        $name = $_SESSION['username'];
        $greetings = sprintf("Kirjaudu ulos tililtä %s", $name);
        echo "<div id='login_info_box'>";
        echo    "<a id='login_info' href='../../private/logout.php'>" . $greetings . "</a>";
        echo "</div>";
    return;
    }
}

?>