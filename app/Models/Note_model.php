<?php

namespace app\Models;

use app\Models\Database_model;


class Note_model extends Database_model {

	public function __construct() {

		parent::__construct();
	}


	public function	get_all( int $user_id ) : array {

    	// Get all notes
		$query = "SELECT * FROM notes WHERE user_id = ?";
    	$sth = $this->pdo->prepare($query);
		$sth->execute([$user_id]);

    	$notes = $sth->fetchAll();

	    foreach ($notes as &$note) {
			$note = [
				'note_id'       => $note['note_ID'],
            	'note'          => $note['note'],
            	'day'           => $note['day']
        	];
		}

		return $notes;
	}


	public function add( ?string $day, string $note, int $user_id ) : void {

    	// Add day specific note
		$query = "INSERT INTO notes (day, note, user_id) VALUES (?, ?, ?)";
    	$this->pdo->prepare($query)->execute([$day, $note, $user_id]);
	}


	public function delete( int $note_id ) : void {

    	// Fetch all notes and delete selected note
    	$this->pdo->prepare("DELETE FROM notes WHERE note_id = ?")->execute([$note_id]);
	}
}
