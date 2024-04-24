<?php

namespace app\Controllers;

use app\{
    Core\Controller,
    Models\Text_model,
    Models\Blog_model,
    Models\Model
};


class Home_controller extends Controller {

    protected Model $text;
    protected Model $blog;

    public function __construct() {

        parent::__construct();
        $this->text = new Text_model();
        $this->blog = new Blog_model();
    }


    public function index() : void {

        $user_params = $this->auth->get_user_session_params();
        $texts = $this->text->get_all("home");
        $blog_texts = $this->blog->get_all();

        $this->view->view("home/index", [
            "title"         => "Ropaz.dev - Pääsivu",
            "user_params"   => $user_params,
            "texts"         => $texts,
            "blog_texts"    => $blog_texts
        ]);
    }


    public function update_view() : void {

        // make sure that this function of this class can't be accessed before login
        if (!$this->auth->is_logged_in()) {
            header("Location: " . site_url("login"));
            exit;
        }

        if (!$this->auth->is_admin()) {
            header("Location: " . site_url("error-401"));
            exit;
        }

        $user_params = $this->auth->get_user_session_params();
        $texts = $this->text->get_all("home");

        $this->view->view("home/update", [
            "title"         => "Ropaz.dev - Päivitä pääsivuteksti",
            "user_params"   => $user_params,
            "texts"         => $texts
        ]);
    }


    public function update() : void {

        // make sure that this function of this class can't be accessed before login
        if (!$this->auth->is_logged_in()) {
            header("Location: " . site_url("login"));
            exit;
        }

        $text = False;

        if (isset($_POST["update_desc_home_button"])) {
            $text = $_POST["desc_home_text"];
        }
        if (!$text) {
            // Back to the home page
            header("Location: " . site_url(""));
            exit;
        } else {
            $text_name = "desc_home";
            $this->text->update($text, $text_name);
        }

        // Back to the home page
        header("Location: " . site_url(""));
    }


    public function add_view() : void {

        // make sure that this function of this class can't be accessed before login
        if (!$this->auth->is_logged_in()) {
            header("Location: " . site_url("login"));
            exit;
        }

        if (!$this->auth->is_admin()) {
            header("Location: " . site_url("error-401"));
            exit;
        }

        $user_params = $this->auth->get_user_session_params();
        $texts = $this->text->get_all("home");
        $blog_texts = $this->blog->get_all();

        $this->view->view("home/add", [
            "title"         => "Ropaz.dev - Lisää blogiteksti",
            "user_params"   => $user_params,
            "texts"         => $texts,
            "blog_texts"    => $blog_texts
        ]);
    }


    public function add() : void {

        // make sure that this function of this class can't be accessed before login
        if (!$this->auth->is_logged_in()) {
            header("Location: " . site_url("login"));
            exit;
        }

        $blog_text = False;

        if (isset($_POST["add_blog_text_button"])) {
            $blog_text = $_POST["blog_text"];
        }
        if (!$blog_text) {
            // Back to the home page
            header("Location: " . site_url(""));
        } else {
            $timestamp = date("o-m-d-h-i-s");
            $this->blog->add($timestamp, $blog_text);
        }

        // Back to the home page add view
        header("Location: " . site_url("home-add_blog_text"));
    }


    public function delete( string $blog_text_id ) : void {

        $blog_text_id = (int)$blog_text_id;
        $this->blog->delete($blog_text_id);

        // Back to the home page add view
        header("Location: " . site_url("home-add_blog_text"));
    }
}
