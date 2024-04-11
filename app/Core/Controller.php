<?php

require_once "../app/Core/View.php";
require_once "../app/Models/Model.php";
require_once "../app/Core/Authenticator.php";
require_once "../app/helpers.php";

class Controller {

	protected View $view;
	protected Model $model;
	protected Authenticator $auth;

	public function __construct() {
		$this->view = new View();
		$this->model = new Model();
		$this->auth = new Authenticator();
	}
}
