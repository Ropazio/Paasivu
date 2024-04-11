<?php

// Move to: require_once "site_config.php";
// Then have a separate site_config.php for server (prod) and local (dev)

// Development (local)
define('SITE_ROOT', 'Paasivu_new');

// Production (server)
//define('SITE_ROOT', '');

//////////////////////////////////////////////////////////////////

function site_url( string $url ) : string {
    return '/' . SITE_ROOT . '/' . $url;
}
