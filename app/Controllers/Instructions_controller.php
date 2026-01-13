<?php

namespace app\Controllers;

use app\{
    Core\Controller,
    Models\Text_model,
    Models\Model
};


class Instructions_controller extends Controller {

    protected Model $text;

    public function __construct() {

        parent::__construct();
        $this->text = new Text_model();
    }


    public function index() : void {

        $user_params = $this->auth->get_user_session_params();
        $texts = $this->text->get_all("instructions");

        $this->view->view("instructions/index", [
            "title"         => "Ropaz.dev - Käyttöohjeet",
            "user_params"   => $user_params,
            "texts"         => $texts
        ]);
    }


    public function update_view() : void {

        // make sure that this function of this class can't be accessed without admin rights
        $this->auth->check_rights_to_access_page();

        $user_params = $this->auth->get_user_session_params();
        $texts = $this->text->get_all("instructions");

        $this->view->view("instructions/update", [
            "title"         => "Ropaz.dev - Päivitä käyttöohjeita",
            "user_params"   => $user_params,
            "texts"         => $texts
        ]);
    }


    public function update() : void {

        // make sure that this function of this class can't be accessed without admin rights
        $this->auth->check_rights_to_access_page();

        $text_field = [
            "desc"              =>  ["desc_instructions", "desc_instructions_text"],
            "desc2"             =>  ["desc_instructions2", "desc_instructions2_text"],
            "git"               =>  ["instructions_git", "instructions_git_text"],
            "linux"             =>  ["instructions_linux", "instructions_linux_text"],
            "sublimetext"       =>  ["instructions_sublimetext", "instructions_sublimetext_text"],
            "selenium"          =>  ["instructions_selenium", "instructions_selenium_text"],
            "ec2"               =>  ["instructions_ec2", "instructions_ec2_text"],
            "nginx"             =>  ["instructions_nginx", "instructions_nginx_text"],
            "php"               =>  ["instructions_php", "instructions_php_text"],
            "mysql"             =>  ["instructions_mysql", "instructions_mysql_text"],
            "tableplus"         =>  ["instructions_tableplus", "instructions_tableplus_text"],
        ];

        if (isset($_POST["update_desc_instructions_button"])) {
            foreach ($text_field as $key => $value) {
                $text_name = $value[0];
                $text = $_POST[$value[1]];
                $this->text->update($text, $text_name);
            }
        } else {
            header("Location: " . site_url("instructions"));
            exit;
        }

        // Back to the instructions page
        header("Location: " . site_url("instructions"));
    }


#    public function add_view() : void {
#
#        // make sure that this function of this class can't be accessed without admin rights
#        $this->auth->check_rights_to_access_page();
#
#        $user_params = $this->auth->get_user_session_params();
#        $texts = $this->text->get_all("instructions");
#
#        $this->view->view("instructions/add", [
#            "title"         => "Ropaz.dev - Lisää käyttöohjeita",
#            "user_params"   => $user_params,
#            "texts"         => $texts
#        ]);
#    }
#
#
#    public function add() : void {
#
#        // make sure that this function of this class can't be accessed without admin rights
#        $this->auth->check_rights_to_access_page();
#
#        $instructions = False;
#
#        if (isset($_POST["add_instructions_button"])) {
#            $instructions = $_POST["instructions"];
#        }
#        if (!$in) {
#            // Back to the instructions page
#            header("Location: " . site_url("instructions"));
#        } else {
#            $timestamp = date("Y-m-d-H-i-s");
#            $this->blog->add($timestamp, $instructions);
#        }
#
#        // Back to the instructions page add view
#        header("Location: " . site_url("instructions-add_instructions"));
#    }


    public function delete( string $instructions_id ) : void {

        $instructions_id = (int)$instructions_id;
        $this->blog->delete($instructions_id);

        // Back to the instructions page add view
        header("Location: " . site_url("instructions-add_instructions"));
    }
}
