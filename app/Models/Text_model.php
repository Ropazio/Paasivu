<?php

namespace app\Models;

use app\Models\Database_model;


class Text_model extends Database_model {

	public function __construct() {

		parent::__construct();
	}

	public function get( string $page_name ) : ?array {



		// Get page texts
		$query = "SELECT text, text_name FROM texts WHERE page_name = ?";
    	$sth = $this->pdo->prepare($query);
		$sth->execute([$page_name]);

		$texts_temp = $sth->fetchAll();

		if (empty($texts_temp)) {
			return null;
		}

		$texts = [];

    	foreach ($texts_temp as &$text_info) {
			$texts[$text_info["text_name"]] = $text_info["text"];
		}

		return $texts;
	}
}