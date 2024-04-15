<?php

namespace app\Controllers;

use app\{
	Core\Controller,
	Models\Coding_project_model,
	Models\Model
};


class Coding_project_controller extends Controller {

	protected Model $model;

	public function __construct() {

		parent::__construct();
		$this->model = new Coding_project_model();
	}


	public function index() : void {

		$user_params = $this->auth->get_user_session_params();

		$this->view->view("coding_project/index", [
			"title" => "Ropaz.dev - Verkkoprojektit",
			"user_params" => $user_params
		]);
	}
}
