<?php

namespace app\Controllers;

use app\{
	Core\Controller,
	Models\Hobby_project_model,
	Models\Model
};


class Hobby_project_controller extends Controller {

	protected Model $model;

	public function __construct() {

		parent::__construct();
		$this->model = new Hobby_project_model();
	}


	public function index() : void {

		$user_params = $this->auth->get_user_session_params();

		$this->view->view("hobby_project/index", [
			"title" => "Ropaz.dev - Askarteluprojektit",
			"user_params" => $user_params
		]);
	}
}
