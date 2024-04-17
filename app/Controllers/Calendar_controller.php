<?php

namespace app\Controllers;

use app\{
	Core\Controller,
	Models\Note_model,
	Models\Model
};


class Calendar_controller extends Controller {

	protected Model $model;

	public function __construct() {

		parent::__construct();
		$this->model = new Note_model();

		// make sure that no other functions of this class can be accessed before login
		if (!$this->auth->is_logged_in()) {
			header("Location: " . site_url("login"));
		}
	}


	public function index() : void {

		$user_params = $this->auth->get_user_session_params();

		// Fetch all user's notes
		$notes = $this->model->get_all($user_params["user_id"]);

		$this->view->view("calendar/index", [
			"title" 		=> "Ropaz.dev - Joku roti",
			"notes" 		=> $notes,
			"user_params" 	=> $user_params
		]);
	}


	public function add() : void {

		$day = False;
		$note = False;

		// Fetch note day and note contents
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
			// Back to the calendar front page
			header("Location: " . site_url("calendar"));
		} else {
			$user_params = $this->auth->get_user_session_params();
			$user_id = $user_params["user_id"];
    		$this->model->add($day, $note, $user_id);
		}

		// Back to the calendar front page
		header("Location: " . site_url("calendar"));
	}


	public function delete( string $note_id ) : void {

		$note_id = (int)$note_id;
		$this->model->delete($note_id);

		// Back to the calendar front page
		header("Location: " . site_url("calendar"));
	}
}
