<?php

namespace app\Models;

use app\Models\Database_model;


class Text_model extends Database_model {

	public function __construct() {

		parent::__construct();
	}

	public function get( string $page_name ) : array {



		// Get page texts
		$query = "SELECT text FROM texts WHERE page_name = ? ORDER BY text_number";
    	$sth = $this->pdo->prepare($query);
		$sth->execute([$page_name]);

		$texts = $sth->fetchAll();

		if (empty($texts)) {
			// Add check here
		}

	    foreach ($texts as &$text) {
			$text = [
				'text'	=> $text['text']
        	];
		}

		return $texts;
	}
}