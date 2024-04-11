<?php

require_once "../app/Models/User_model.php";

class Authenticator_controller extends Controller {

	protected Model $user;

	public function __construct() {
		parent::__construct();
		$this->user = new User_model();
	}

	public function index() {
		$user_params = $this->auth->get_user_session_params();

		$this->view->view("authentication/login", [
			"title" => "Ropaz.dev - Kirjaudu",
			"user_params" => $user_params
		]);
	}

	public function login() {

		$username = $_POST['username'];
		$password = $_POST['password'];

		$login_successful = $this->login_successful($username, $password);

		if ($login_successful == true) {
			header ("Location: " . site_url("calendar"));
		} else {
			header("Location: " . site_url("login?error=login_failed"));
		}
	}

	public function login_successful($username, $password) : bool {

    	// Check if username and password are found in the database. If not, return to the login page. If the username or password don't match, return to the login page.
    	$id = $this->user->get_user_id($username, $password);

    	if (empty($id)) {
        	return false;
    	}

    	// start user session
    	$logged_in = true;
    	$this->auth->start_user_session($logged_in, $id, $username);

    	return true;
	}

	public function logout() {
    
    	// Unset all of the session variables, delete cookies and end session.
    	$this->auth->unset_user_session();
    	$this->auth->delete_session_cookies();
    	$this->auth->end_session();
		
		header ("Location: " . site_url(""));
	}
}
