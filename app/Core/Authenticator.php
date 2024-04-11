<?php

// require_once

class Authenticator {

	public $session;

	public function __construct() {
		$this->session = [
			$_SESSION = array(),
			$_SESSION['logged_in'] = null,
			$_SESSION['username'] = null,
			$_SESSION['user_id'] = null
		];
	}

	public static function start_session() : bool {
		// don't set up multiple sessions
        if (session_status() !== PHP_SESSION_NONE) {
            return false;
        }
        session_set_cookie_params(0);
        return session_start();
	}

	public function is_logged_in() : bool {
		if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] != '')) {
			return False;
		}
		return $_SESSION['logged_in'];
	}

	public function get_username() {
        $name = $_SESSION['username'];
    	return $name;
    }
}
