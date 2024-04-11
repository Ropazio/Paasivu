<?php

require_once "../app/Core/Authenticator.php";
require_once "../app/Models/User_model.php";

class Authenticator_controller extends Controller {

	protected Authenticator $auth;
	protected Model $user;

	public function __construct() {
		parent::__construct();
		$this->auth = new Authenticator();
		$this->user = new User_model();
	}

	public function index() {
		$this->view->view("authentication/login", [
			"title" => "Ropaz.dev - Kirjaudu"
		]);
	}

	public function login() {

		$username = $_POST['username'];
		$password = $_POST['password'];

		$login_successful = $this->login_successful($username, $password);

		if ($login_successful == true) {
			header ("Location: calendar");
		} else {
			header("Location: login?error=login_failed");
		}
	}

	public function login_successful($username, $password) : bool {

    	// Check if username and password are found in the database. If not, return to the login page. If the username or password don't match, return to the login page.
    	$ID = $this->user->get_user_id($username, $password);

    	if (empty($ID)) {
        	return false;
    	}

    	// TODO: Add to start user session authenticator
    	// If everything is ok, continue to the calendar.
    	$_SESSION['logged_in'] = true;
    	$_SESSION['user_id'] = $ID;
    	$_SESSION['username'] = $username;

    	return true;
	}

	public function logout() {
    
    	// Unset all of the session variables.
    	// TODO: Add function unset session in authenticator
    	$_SESSION = array();
    
    	// Delete cookies
    	if (ini_get("session.use_cookies")) {
        	$params = session_get_cookie_params();
        	setcookie(session_name(),
        		'',
        		time() - 42000,
            	$params["path"],
            	$params["domain"],
            	$params["secure"],
            	$params["httponly"]
        	);
    	}
    	session_destroy();
		
		header ("Location: /");
	}
}
