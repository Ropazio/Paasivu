<?php

// Move to: require_once "site_config.php";
// Then have a separate site_config.php for server (prod) and local (dev)

define("ROOT", dirname(__DIR__));

// Development (local)
define("SITE_ROOT_URL", "Paasivu_new");

// Production (server)
//define("SITE_ROOT_URL", "");

//////////////////////////////////////////////////////////////////

$folders = [
        "app"               => (ROOT . "/app/"),
        "controllers"       => (ROOT . "/app/" . "Controllers/"),
        "core"              => (ROOT . "/app/" . "Core/"),
        "models"            => (ROOT . "/app/" . "Models/"),
        "views"             => (ROOT . "/app/" . "views/"),
        "snippets"          => (ROOT . "/app/" . "views/" . "__snippets/"),
        "errors"            => (ROOT . "/app/" . "views/" . "__errors/"),
        "styles"            => (ROOT . "/public_html/" . "styles/"),
        "js"                => (ROOT . "/public_html/" . "js/"),
        "fonts"             => (ROOT . "/public_html/" . "fonts/"),
        "img"               => (ROOT . "/public_html/" . "img/"),
        "projects"          => (ROOT . "/public_html/" . "img/projects/"),
];

function site_url( string $url ) : string {
    return "/" . SITE_ROOT_URL . "/" . $url;
}


function file_path( string $folder_name, string $file_name = "" ) : string {

    global $folders;
    
    $path = $folders[$folder_name] . $file_name;

    return $path;
}
