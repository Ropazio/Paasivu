<?php

namespace app\Models;

use app\Models\Database_model;


class Hobby_project_model extends Database_model {

    public function __construct() {

        parent::__construct();
    }


    public function get_all() : array {

        // Get all notes
        $query = "SELECT * FROM hobby_projects";
        $sth = $this->pdo->prepare($query);
        $sth->execute();

        $projects = $sth->fetchAll();

        foreach ($projects as &$project) {
            $project = [
                "project_id"    => $project["project_ID"],
                "project_name"  => $project["project_name"],
                "project_type"  => $project["project_type"],
                "project_desc"  => $project["project_desc"],
                "image_data"    => $project["image_data"]
            ];
            $project["image_data"] = json_decode($project["image_data"], true);
        }

        return $projects;
    }


    public function add( string $project_type, string $project_name, string $project_desc, array $image_data ) : void {

        // Add project
        $image_data = json_encode($image_data);
        $query = "INSERT INTO hobby_projects (project_type, project_name, project_desc, image_data) VALUES (?, ?, ?, ?)";
        $this->pdo->prepare($query)->execute([$project_type, $project_name, $project_desc, $image_data]);
    }


    public function delete( string $project_name ) : void {

        $this->pdo->prepare("DELETE FROM hobby_projects WHERE project_name = ?")->execute([$project_name]);
    }


    public function get_images( string $project_name ) : array {

        $sth = $this->pdo->prepare("SELECT image_data FROM hobby_projects WHERE project_name = ?");
        $sth->execute([$project_name]);

        $projects = $sth->fetch(\PDO::FETCH_ASSOC);

        $images = json_decode($projects["image_data"], true);

        $image_names = [];
        foreach ($images as $image) {
            array_push($image_names, $image["src"]);
        }

        return $image_names;
    }
}