<?php

namespace app\Models;

use app\Models\Database_model;


class Text_model extends Database_model {

	public function __construct() {

		parent::__construct();
	}


	public function get_all( string $page_name ) : ?array {

		// Get all page texts as array = ["text_name1" => "text1", "text_name2" => "text2" ...]
		$query = "SELECT text, text_name FROM page_texts WHERE page_name = ?";
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


	public function get_one( string $text_name ) : string {

		// Get one page text
		$query = "SELECT text FROM page_texts WHERE text_name = ?";
		$sth = $this->pdo->prepare($query);
		$sth->execute([$text_name]);

		$text = $sth->fetch(\PDO::FETCH_ASSOC);

		return $text["text"];
	}


	public function update( string $text, string $text_name ) : void {

		// Update text with given text name
		$query = "UPDATE page_texts SET text = ? WHERE text_name = ?";
		$sth = $this->pdo->prepare($query);
		$sth->execute([$text, $text_name]);
	}
}