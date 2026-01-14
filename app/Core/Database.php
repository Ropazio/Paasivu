<?php

namespace app\Core;

use PDO;


class Database extends PDO {

    protected PDO $pdo;

    public function __construct() {
    
        // Database
    
        $dbConfig = [
            "name"          => DB_NAME,
            "user"          => DB_USER,
            "password"      => DB_PASSWORD,
            "options"       => DB_OPTIONS
        ];
    
        $this->pdo = new PDO(
            "mysql:host=127.0.0.1;dbname=". $dbConfig["name"],
            $dbConfig["user"],
            $dbConfig["password"],
            $dbConfig["options"]
        );
    
    
        // Connecting to the database
    
        $this->pdo->exec("SET NAMES utf8");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }


    public function get_pdo() : PDO {

        return $this->pdo;
    }
}
