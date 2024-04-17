<?php

namespace app\Controllers;

use app\{
	Core\Controller
};


class Error_controller extends Controller {

	public function __construct() {

		parent::__construct();
	}


	public function error_404() : void {

		$user_params = $this->auth->get_user_session_params();

		$this->view->view("__errors/404", [
			"title" 		=> "Ropaz.dev - Virhe",
			"user_params" 	=> $user_params
		]);
	}


	public function error_500() : void {

		$user_params = $this->auth->get_user_session_params();

		$this->view->view("__errors/500", [
			"title" 		=> "Ropaz.dev - Virhe",
			"user_params" 	=> $user_params
		]);
	}
}