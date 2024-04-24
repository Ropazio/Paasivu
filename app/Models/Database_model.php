<?php

namespace app\Models;

use app\{
    Models\Model,
    Core\Database
};


class Database_model extends Model {

    private Database $database;
    protected \PDO $pdo;

    public function __construct() {

        $this->database = new Database();
        $this->pdo = $this->database->get_pdo();
    }
}
