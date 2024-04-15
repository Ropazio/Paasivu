<?php

namespace app\Controllers;

use app\{
	Core\Controller
};


class Home_controller extends Controller {

	public function __construct() {

		parent::__construct();
	}


	public function index() : void {

		$user_params = $this->auth->get_user_session_params();

		$this->view->view("home/index", [
			"title" => "Ropaz.dev - Pääsivu",
			"user_params" => $user_params
		]);
	}
}
