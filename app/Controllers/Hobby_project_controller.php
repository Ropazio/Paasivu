<?php

namespace app\Controllers;

use app\{
	Core\Controller,
	Models\Hobby_project_model,
	Models\Project_category_model,
	Models\Text_model,
	Models\Model
};


class Hobby_project_controller extends Controller {

	protected Model $model;
	protected Model $text;
	protected Model $category;

	public function __construct() {

		parent::__construct();
		$this->model = new Hobby_project_model();
		$this->text = new Text_model();
		$this->category = new Project_category_model();
	}


	public function index() : void {

		$user_params = $this->auth->get_user_session_params();
		$texts = $this->text->get_all("hobby");
		$projects = $this->model->get_all();
		$arranged_projects = $this->arrange_projects( $projects );
		$counts = $this->get_category_info();

		$this->view->view("hobby_project/index", [
			"title" 		=> "Ropaz.dev - Askarteluprojektit",
			"user_params" 	=> $user_params,
			"texts"			=> $texts,
			"projects"		=> $arranged_projects,
			"counts"		=> $counts
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
        		"src"		=> $_FILES["image_src"],
        		"name"		=> $_POST["image_name"],
        		"is_wide"	=> $_POST["wide_image"]
        	];
        }

        $image_data = [];

        // Loop through each image data row
       	for ($i=0; $i < count($image_info["name"]); $i++) {
       		$data = [];
       		foreach ($image_info as $key => $values) {
       			if (empty($values)) {
       				header("Location: " . site_url("hobby-add_project?error=failed"));
        			exit;
       			}
       			if ($key == "src") {
       				$this->add_to_images( $values["name"][$i], $values["tmp_name"][$i] );
       				$data[$key] = $values["name"][$i];
       			} else {
       				$data[$key] = $values[$i];
       			}
       		}
       		array_push($image_data, $data);
       	}

       	$this->model->add( $project_type, $project_desc, $image_data );

        // Back to the hobby page
		header("Location: " . site_url("hobby-add_project"));
	}


	public function add_to_images( string $image_name, string $image_tmp_name ) : void {

       	// Get file info
        $file_name = basename($image_name);
        $file_type = pathinfo($file_name, PATHINFO_EXTENSION);
        $folder = ROOT . "/" . file_path("projects", $file_name);

		// Allow certain file formats
       	$allow_types = array("jpg","png","jpeg");
       	if (in_array($file_type, $allow_types)) {
       		if (move_uploaded_file($image_tmp_name, $folder)) {
       			//$this->create_small_image($image_name);
       			return;
       		} else {
 				header("Location: " . site_url("hobby-add_project?error=failed"));
       			exit;
       		}
		} else {
       		header("Location: " . site_url("hobby-add_project?error=failed"));
       		exit;
       	}
	}


	public function create_small_image( string $original_image ) : void {

		// THIS FUNCTION IS NOT WORKING!!!
		$reduce_factor = 10;
		$original_path = ROOT . "/" . file_path("projects", $original_image);
		
		// Content type
		header('Content-Type: image/jpeg');
		
		// Get new dimensions
		list($width, $height) = getimagesize($original_path);
		$new_width = $width / $reduce_factor;
		$new_height = $height / $reduce_factor;
		
		// Resample
		$image_p = imagecreatetruecolor($new_width, $new_height);
		$image = imagecreatefromjpeg($original_path);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
		
		// Save
		$file_name = pathinfo($original_image, PATHINFO_FILENAME) . "-small." . pathinfo($original_image, PATHINFO_EXTENSION);
		$folder = ROOT . "/" . file_path("projects", $file_name);
		imagejpeg($image_p, $folder, 100);
	}


	public function get_category_info() : array {
		$categories = ["crochet", "textile", "tech", "other"];

		$counts = [];
		foreach ($categories as $category) {
			$count = $this->category->count_projects_in_category($category);
			if (!$count) {
				//
			} else {
				$counts[$category] = $count;
			}
		}

		return $counts;
	}


	public function arrange_projects( array $projects ) : array {
		$categories = [
			"crochet"	=> [],
			"textile"	=> [],
			"tech"		=> [],
			"other"		=> []
		];

		foreach ($projects as $project) {
			foreach ($categories as $key => $value) {
				if ($project["project_type"] == $key) {
					array_push($categories[$key], $project);
				}
			}
		}

		return $categories;
	}
}
