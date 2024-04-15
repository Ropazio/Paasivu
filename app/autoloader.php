<?php

spl_autoload_register( function( string $class ) : void {
	$root_path = $_SERVER['DOCUMENT_ROOT'];
	$file = $root_path . "Paasivu_new/" . str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";

	if (file_exists($file)) {
		require $file;
	}
});
