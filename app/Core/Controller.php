<?php

require_once "../app/Core/View.php";
require_once "../app/Models/Model.php";

class Controller {

	protected View $view;
	protected Model $model;

	public function __construct() {
		$this->view = new View();
		$this->model = new Model();
	}
}
