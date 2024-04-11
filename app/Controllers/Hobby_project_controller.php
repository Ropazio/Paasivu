<?php

require_once "../app/Models/Hobby_project_model.php";

class Hobby_project_controller extends Controller {

	protected Model $model;

	public function __construct() {
		parent::__construct();
		$this->model = new Hobby_project_model();
	}

	public function index() {
		$this->view->view("hobby_project/index", [
			"title" => "Ropaz.dev - Askarteluprojektit"
		]);
	}
}
