<?php

namespace app\Controllers;

use app\{
	Core\Controller,
	Models\Text_model,
	Models\Model
};


class Home_controller extends Controller {

	protected Model $text;

	public function __construct() {

		parent::__construct();
		$this->text = new Text_model();
	}


	public function index() : void {

		$user_params = $this->auth->get_user_session_params();
		$texts = $this->text->get_all("home");
		$this->text->get_one("desc_home");


		$this->view->view("home/index", [
			"title" 		=> "Ropaz.dev - Pääsivu",
			"user_params" 	=> $user_params,
			"texts" 		=> $texts
		]);
	}


	public function update_view() : void {

		$user_params = $this->auth->get_user_session_params();
		$texts = $this->text->get_all("home");

		$this->view->view("home/update", [
			"title" 		=> "Ropaz.dev - Pääsivu",
			"user_params" 	=> $user_params,
			"texts" 		=> $texts
		]);
	}


	public function update() : void {

		$text = False;

		if (isset($_POST["update_desc_home_button"])) {
        	$text = $_POST["desc_home_text"];
        }
        if (!$text) {
			// Back to the home page
			header("Location: " . site_url(""));
		} else {
			$text_name = "desc_home";
    		$this->text->update($text, $text_name);
		}

		// Back to the home page
		header("Location: " . site_url(""));
	}
}
