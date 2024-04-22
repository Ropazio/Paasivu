<?php

namespace app\Controllers;

use app\{
	Core\Controller,
	Models\Hobby_project_model,
	Models\Text_model,
	Models\Model
};


class Hobby_project_controller extends Controller {

	protected Model $model;
	protected Model $text;

	public function __construct() {

		parent::__construct();
		$this->model = new Hobby_project_model();
		$this->text = new Text_model();
	}


	public function index() : void {

		$user_params = $this->auth->get_user_session_params();
		$texts = $this->text->get_all("hobby");

		$this->view->view("hobby_project/index", [
			"title" 		=> "Ropaz.dev - Askarteluprojektit",
			"user_params" 	=> $user_params,
			"texts"			=> $texts
		]);
	}


	public function update_view() : void {

		// make sure that this function of this class can't be accessed before login
		if (!$this->auth->is_logged_in()) {
			header("Location: " . site_url("login"));
		}

		$user_params = $this->auth->get_user_session_params();
		$texts = $this->text->get_all("hobby");

		$this->view->view("hobby_project/update", [
			"title" 		=> "Ropaz.dev - Päivitä askarteluprojektiteksti",
			"user_params" 	=> $user_params,
			"texts" 		=> $texts
		]);
	}


	public function update() : void {

		// make sure that this function of this class can't be accessed before login
		if (!$this->auth->is_logged_in()) {
			header("Location: " . site_url("login"));
		}

		$text_field = [
			"desc"			=>	["desc_hobby", "desc_hobby_text"],
			"crochet"		=>	["hobby_crochet", "desc_hobby_crochet_text"],
			"textile"		=>	["hobby_textile", "desc_hobby_textile_text"],
			"tech"			=>	["hobby_tech", "desc_hobby_tech_text"],
			"other"			=>	["hobby_other", "desc_hobby_other_text"]
		];

		if (isset($_POST["update_desc_hobby_button"])) {
			foreach ($text_field as $key => $value) {
				$text_name = $value[0];
        		$text = $_POST[$value[1]];
        		$this->text->update($text, $text_name);
        	}
        } else {
        	header("Location: " . site_url("hobby_projects"));
		}

		// Back to the hobby page
		header("Location: " . site_url("hobby_projects"));
	}


	public function add_view() : void {

		// make sure that this function of this class can't be accessed before login
		if (!$this->auth->is_logged_in()) {
			header("Location: " . site_url("login"));
		}

		$user_params = $this->auth->get_user_session_params();

		$this->view->view("hobby_project/add", [
			"title" 		=> "Ropaz.dev - Lisää askarteluprojekti",
			"user_params" 	=> $user_params
		]);
	}


	public function add() : void {

		// make sure that this function of this class can't be accessed before login
		if (!$this->auth->is_logged_in()) {
			header("Location: " . site_url("login"));
		}

		if (isset($_POST["add_project_button"])) {
			$project_type = $_POST["project_type"];
			$project_desc = $_POST["project_desc"];
			$image_info = [
        		"src"		=> $_POST["image_src"],
        		"name"		=> $_POST["image_name"],
        		"is_wide"	=> $_POST["wide_image"]
        	];
        }
			
		foreach ($image_info["src"] as $src) {
			if (!preg_match("(\.png|\.jpg|\.jpeg)", $src)) {
        		header("Location: " . site_url("hobby-add_project?error=failed"));
        		exit;
       		}
       	}

        $image_data = [];
       	for ($i=0; $i < count($image_info["src"]); $i++) {
       		$image = [];
       		foreach ($image_info as $key => $value) {
       			$image[$key] = $value[$i];
       		}
       		array_push($image_data, $image);
       	}

       	$this->model->add( $project_type, $project_desc, $image_data );

        // Back to the hobby page
		header("Location: " . site_url("hobby-add_project"));
	}
}
