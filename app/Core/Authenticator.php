<?php

// require_once

class Authenticator {

	/*

	SESSION INFO:

	$_SESSION['logged_in'],
	$_SESSION['username'],
	$_SESSION['user_id']

	*/

	public static function start_session() : bool {

		// Check if session already exists
        if (session_status() !== PHP_SESSION_NONE) {
            return false;
        }
        session_set_cookie_params(0);
        return session_start();
	}


	public static function is_logged_in() : bool {

		if (!(isset($_SESSION['logged_in']))) {
			return false;
		}
		return $_SESSION['logged_in'];
	}


	public static function start_user_session( bool $logged_in, int $user_id, string $username ) : void {

		$_SESSION['logged_in'] = $logged_in;
    	$_SESSION['user_id'] = $user_id;
    	$_SESSION['username'] = $username;
	}


	public function get_user_session_params() : array {

		$logged_in = isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : false;
		$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
		$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";

		$params = [
			"logged_in" 	=> $logged_in,
			"user_id" 		=> $user_id,
			"username" 		=> $username
		];
		return $params;
	}


	public static function unset_user_session() : bool {

		return session_unset();
	}


	public function delete_session_cookies() : void {

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
	}


	public static function end_session() : bool {

		return session_destroy();
	}
}
