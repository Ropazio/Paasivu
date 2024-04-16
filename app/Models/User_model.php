<?php

namespace app\Models;

use app\Models\Database_model;
use \PDO;


class User_model extends Database_model {

	public function __construct() {

		parent::__construct();
	}


	public function get_user_id( string $username, string $password ) : ?int {

    	// Search user from the database users
    	$query = $this->pdo->prepare("SELECT password, user_ID FROM users WHERE username = ?");
    	$query->execute([$username]);
    	[$user_password_in_database, $user_ID_in_database] = $query->fetch();

    	// Return null if user password is empty
    	if (empty($user_password_in_database)) {
        	return null;
    	}

    	// Return user ID if user password is found and it matches the one in the database
    	if ($user_password_in_database == $password) {
        	return $user_ID_in_database;
    	}

    	return null;
	}


	public function add_user( string $username, string $password ) : ?bool {

		$query = $this->pdo->prepare("SELECT EXISTS(SELECT 1 FROM users WHERE username = ?)");
		$query->execute([$username]);
		$exists = $query->fetch();
		if (!$exists[0]) {
			$query = "INSERT INTO users (username, password) VALUES (?, ?)";
    		$this->pdo->prepare($query)->execute([$username, $password]);
    		return true;
		} else {
			return false;
		}
	}
}
