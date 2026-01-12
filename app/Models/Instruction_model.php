<?php

namespace app\Models;

use app\Models\Database_model;


class Instruction_model extends Database_model {

    public function __construct() {

        parent::__construct();
    }


    public function get_all() : ?array {

        // Get all instructions as array = ["instruction_name1" => "instruction1", "instruction_name2" => "instruction2" ...]
        $query = "SELECT instruction, instruction_name FROM instructions";
        $sth = $this->pdo->prepare($query);
        $sth->execute();

        $instructions_temp = $sth->fetchAll();

        if (empty($instructions_temp)) {
            return null;
        }

        $instructions = [];

        foreach ($instructions_temp as &$instruction_info) {
            $instructions[$instruction_info["instruction_name"]] = $instruction_info["instruction"];
        }

        return $instructions;
    }


    public function update( string $instruction, string $instruction_name ) : void {

        // Update instruction with given instruction name
        $query = "UPDATE instructions SET instruction = ? WHERE instruction_name = ?";
        $sth = $this->pdo->prepare($query);
        $sth->execute([$instruction, $instruction_name]);
    }
}