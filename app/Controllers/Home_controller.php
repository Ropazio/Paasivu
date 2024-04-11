<?php

require_once "../app/Core/Authenticator.php";

class Home_controller extends Controller {

	public function __construct() {
		parent::__construct();
		$auth = new Authenticator();
	}

	public function index() {
		$this->view->view("home/index", [
			"title" => "Ropaz.dev - Pääsivu"
		]);
	}
}
