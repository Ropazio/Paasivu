<?php

require_once "../app/Models/Note_model.php";
require_once "../app/Core/Authenticator.php";

class Calendar_controller extends Controller {

	protected Model $model;
	protected Authenticator $auth;

	public function __construct() {
		parent::__construct();
		$this->model = new Note_model();

		// authentification to all endpoints
		$this->auth = new Authenticator();
		if (!$this->auth->is_logged_in()) {
			header("Location: login");
		} else {
			header("Location: calendar");
		}
	}

	// List all
	public function index() {
		//$this->->get_username();
		//$this->get_user_id();
		$notes = $this->model->get_all($user_ID);

		$this->view->view("calendar/index", [
			"title" => "Ropaz.dev - Joku roti",
			"notes" => $notes
		]);
	}

	// Add new note
	public function add($day, $note) {

		$day = False;
		$note = False;

    	if (isset($_POST['day0_button'])) {
        	$day = null;
        	$note = $_POST['day0_text'];

    	} else if (isset($_POST['day1_button'])) {
        	$day = date("o-m-d");
        	$note = $_POST['day1_text'];

    	} else if (isset($_POST['day2_button'])) {
        	$day = date("o-m-d", strtotime("+1 day"));
        	$note = $_POST['day2_text'];

    	} else if (isset($_POST['day3_button'])) {
        	$day = date("o-m-d", strtotime("+2 day"));
        	$note = $_POST['day3_text'];

    	} else if (isset($_POST['day4_button'])) {
        	$day = date("o-m-d", strtotime("+3 day"));
        	$note = $_POST['day4_text'];

    	} else if (isset($_POST['day5_button'])) {
        	$day = date("o-m-d", strtotime("+4 day"));
        	$note = $_POST['day5_text'];

    	} else if (isset($_POST['day6_button'])) {
        	$day = date("o-m-d", strtotime("+5 day"));
        	$note = $_POST['day6_text'];

    	} else if (isset($_POST['day7_button'])) {
        	$day = date("o-m-d", strtotime("+6 day"));
        	$note = $_POST['day7_text'];
    	}
	    	
		if (!$note) {
    		echo "An error occurred in saving the note :(";
		} else {
    		$notes = $this->model->add_note($day, $note);
		}

		// Back to the calendar front page
		header("Location: calendar");
	}

	// Delete existing note
	public function delete() {
		$note_id = $_GET['note_ID'];
		$note_id = (int)$ID;

		$this->model->delete_note($note_id);

		// Back to the calendar front page
		header("Location: calendar");
	}
}
