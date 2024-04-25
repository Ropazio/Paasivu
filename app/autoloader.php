<?php

spl_autoload_register( function( string $class ) : void {
    $file = ROOT . "/" . str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";

    if (file_exists($file)) {
        require $file;
    }
});
