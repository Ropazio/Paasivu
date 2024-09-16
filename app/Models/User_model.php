<?php

namespace app\Models;

use app\Models\Database_model;
use \PDO;


class User_model extends Database_model {

    public function __construct() {

        parent::__construct();
    }


    public function get_user_info( string $username, string $password ) : ?array {

        // Search user from the database users
        $query = $this->pdo->prepare("SELECT password, user_ID, admin FROM users WHERE username = ?");
        $query->execute([$username]);
        [$password_hash, $user_id_in_database, $is_admin] = $query->fetch();

        // Return null if user password is empty
        if (empty($password_hash)) {
            return null;
        }

        // Return user ID if user password is found and it matches the one in the database
        if (password_verify($password, $password_hash)) {
            $user_info = [
                "user_id"   => $user_id_in_database,
                "is_admin"  => $is_admin
            ];
            return $user_info;
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
