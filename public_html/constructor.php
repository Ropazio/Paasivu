<?php

function get_be($file) {
	if (!defined("ROOT")) define("ROOT", dirname(__FILE__, 2));
	$file_path = ROOT . "/private/" . $file;

	return $file_path;
}

?>