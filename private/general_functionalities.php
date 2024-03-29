<?php

function load_head_and_page_theme($page_title) {
    $theme = load_theme();

    echo "<!--------------------\n";
    echo "                      \n";
    echo "    Oh, Hi there!     \n";
    echo "                      \n";
    echo "    |\       /|       \n";
    echo "    |,\_,,,_//\       \n";
    echo "    /   ’;’     \     \n";
    echo "   /  ^  ’  ^   \     \n";
    echo "   |  0     0   /\    \n";
    echo "   | =» T «=    //\   \n";
    echo "    \,    o     //\   \n";
    echo "      \,,,, \ \  //\  \n";
    echo "    _    _ /\/\/\ //\ \n";
    echo "___|||__|||__________ \n";
    echo "--------------------- \n";
    echo "                      \n";
    echo "--------------------->\n";

    echo "<head>";
    echo "<meta charset='utf-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1'>";
    echo "<link rel='stylesheet' href='../styles/main_page_styles.css' />";
    echo "<link rel='stylesheet' href=$theme />";
    echo "<title>$page_title</title>";
    echo "</head>";
}

function load_theme() {
    $date = date("m");
    $summer_months = array(4, 5, 6, 7, 8);
    $christmas_months = array(12);

    if (in_array($date, $summer_months)) {
        return '../styles/summer_theme.css';
    }
    elseif (in_array($date, $christmas_months)) {
        return '../styles/christmas_theme.css';
    }

    return '../styles/supper_theme.css';
}

function load_github_logo() {
    echo "<div  class='github_area'>";
    echo "  <a href='https://github.com/Ropazio' target='_blank'>";
    echo "      <!-- image from https://www.pngegg.com/en/search?q=github+Logo -->";
    echo "      <button id='cat_button' type='button' alt='github logo'></button>";
    echo "  </a>";
    echo "</div>";
}

function load_header() {
    echo "<div class='header'></div>";
}

function load_footer() {
    echo "<div class='footer'>";
    echo "  <div class='footer_content_area'>";
    load_github_logo();
    echo "  <h4 class='footer_text'>Ropaz 2024</h4>";
    echo    "</div>";
    echo "</div>";
}

?>