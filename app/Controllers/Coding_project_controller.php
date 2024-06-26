<?php

namespace app\Controllers;

use app\{
    Core\Controller,
    Models\Coding_project_model,
    Models\Text_model,
    Models\Model
};


class Coding_project_controller extends Controller {

    protected Model $model;
    protected Model $text;

    public function __construct() {

        parent::__construct();
        $this->model = new Coding_project_model();
        $this->text = new Text_model();
    }


    public function index() : void {

        $user_params = $this->auth->get_user_session_params();
        $texts = $this->text->get_all("coding");

        $this->view->view("coding_project/index", [
            "title"         => "Ropaz.dev - Verkkoprojektit",
            "user_params"   => $user_params,
            "texts"         => $texts
        ]);
    }


    public function update_view() : void {

        // make sure that this function of this class can't be accessed without admin rights
        $this->auth->check_rights_to_access_page();

        $user_params = $this->auth->get_user_session_params();
        $texts = $this->text->get_all("coding");

        $this->view->view("coding_project/update", [
            "title"         => "Ropaz.dev - Päivitä verkkoprojektiteksti",
            "user_params"   => $user_params,
            "texts"         => $texts
        ]);
    }


    public function update() : void {

        // make sure that this function of this class can't be accessed without admin rights
        $this->auth->check_rights_to_access_page();

        $text_field = [
            "desc"              =>  ["desc_coding", "desc_coding_text"],
            "pekkaspaivat"      =>  ["coding_pekkaspaivat", "desc_coding_pekkaspaivat_text"],
            "nettikasvio"       =>  ["coding_nettikasvio", "desc_coding_nettikasvio_text"],
            "joulutoivelista"   =>  ["coding_joulutoivelista", "desc_coding_joulutoivelista_text"]
        ];

        if (isset($_POST["update_desc_coding_button"])) {
            foreach ($text_field as $key => $value) {
                $text_name = $value[0];
                $text = $_POST[$value[1]];
                $this->text->update($text, $text_name);
            }
        } else {
            header("Location: " . site_url("coding_projects"));
            exit;
        }

        // Back to the coding page
        header("Location: " . site_url("coding_projects"));
    }
}
