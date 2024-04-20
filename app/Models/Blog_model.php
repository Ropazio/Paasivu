<?php

namespace app\Models;

use app\Models\Database_model;


class Blog_model extends Database_model {

	public function __construct() {

		parent::__construct();
	}


	public function	get_all() : array {

    	// Get all blog texts
		$query = "SELECT * FROM blog_texts";
    	$sth = $this->pdo->prepare($query);
		$sth->execute();

    	$blog_texts = $sth->fetchAll();

	    foreach ($blog_texts as &$blog_text) {
			$blog_text = [
				"blog_id"  			=> $blog_text["blog_ID"],
            	"blog_text"     	=> $blog_text["blog_text"],
            	"timestamp"   		=> $blog_text["timestamp"]
        	];
		}

		return $blog_texts;
	}


	public function add( string $timestamp, string $blog_text ) : void {

		$query = "INSERT INTO blog_texts (timestamp, blog_text) VALUES (?, ?)";
    	$this->pdo->prepare($query)->execute([$timestamp, $blog_text]);
	}


	public function delete( int $blog_id ) : void {

    	// Fetch all blog texts and delete selected blog text
    	$this->pdo->prepare("DELETE FROM blog_texts WHERE blog_id = ?")->execute([$blog_id]);
	}
}
