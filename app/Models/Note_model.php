<?php

require_once "../app/Models/Database_model.php";

class Note_model extends Database_model {

	public function __construct() {

		parent::__construct();
	}


	public function	get_all( int $user_ID ) : array {

    	// Get all notes
    	$query = "SELECT * FROM notes WHERE user_ID = ?";
    	$sth = $this->pdo->prepare($query);
    	$sth->execute([$user_ID]);

    	$notes = $sth->fetchAll();

	    foreach ($notes as &$note) {
			$note = [
            	'note_ID'       => $note['note_ID'],
            	'note'          => $note['note'],
            	'day'           => $note['day']
        	];
		}

		return $notes;
	}


	public function add( ?int $day, string $note, int $user_id ) : void {

    	// Add day specific note
    	$query = "INSERT INTO notes (day, note, user_ID) VALUES (?, ?, ?)";
    	$this->pdo->prepare($query)->execute([$day, $note, $user_id]);
	}


	public function delete( int $note_ID ) : void {

    	// Fetch all notes and delete selected note
    	$this->pdo->prepare("DELETE FROM notes WHERE note_ID = ?")->execute([$note_ID]);
	}


	public function delete_old_from_database( int $date) : void {

    	if ($date < date("o-m-d")) {
        	// Fetch all notes and delete old notes (yesterday or before)
			$this->pdo->prepare("DELETE FROM notes WHERE day = ?")->execute([$date]);
    	} else {
        	echo "No old notes.";
    	}
	}
}
