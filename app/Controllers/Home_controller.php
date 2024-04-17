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
}
