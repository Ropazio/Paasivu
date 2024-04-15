<?php

// Move to: require_once "site_config.php";
// Then have a separate site_config.php for server (prod) and local (dev)

// Development (local)
define("SITE_ROOT", "Paasivu_new");
define("ROOT", dirname(__DIR__));

// Production (server)
//define("SITE_ROOT", "");

//////////////////////////////////////////////////////////////////

$folders = [
        "app"               => (ROOT . "/app/"),
        "controllers"       => (ROOT . "/app/" . "Controllers/"),
        "core"              => (ROOT . "/app/" . "Core/"),
        "models"            => (ROOT . "/app/" . "Models/"),
        "views"             => (ROOT . "/app/" . "views/"),
        "snippets"          => (ROOT . "/app/" . "views/" . "__snippets/"),
        "errors"            => (ROOT . "/app/" . "views/" . "__errors/"),
        "styles"            => ("public_html/" . "styles/"),
        "js"                => ("public_html/" . "js/"),
        "fonts"             => ("public_html/" . "fonts/"),
        "img"               => ("public_html/" . "img/"),
        "projects"          => ("public_html/" . "img/projects/"),
];

function site_url( string $url ) : string {
    return "/" . SITE_ROOT . "/" . $url;
}


function file_path( string $folder_name, string $file_name = "" ) : string {

    global $folders;
    
    $path = $folders[$folder_name] . $file_name;

    return $path;
}
