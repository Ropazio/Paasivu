<?php

require_once "../app/Core/Database.php";

class Database_model extends Model {

	private Database $database;
	protected PDO $pdo;

	public function __construct() {

		$this->database = new Database();
		$this->pdo = $this->database->get_pdo();
	}
}
