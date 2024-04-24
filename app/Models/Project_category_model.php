<?php

namespace app\Models;

use app\Models\Database_model;


class Project_category_model extends Database_model {

    public function __construct() {

        parent::__construct();
    }


    public function count_projects_in_category( $category ) : int {
        $query = "SELECT COUNT(*) FROM hobby_projects WHERE project_type = ?";
        $sth = $this->pdo->prepare($query);
        $sth->execute([$category]);

        $count = $sth->fetchColumn();

        return $count;
    }
}
