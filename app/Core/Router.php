<?php

namespace app\Core;

use app\{
	Core\Authenticator,
	Controllers
};


class Router {

	// ROUTING TABLE = ["page url" => [controller name, method name/function]]
		const ROUTING_TABLE = [
			"POST" => [
				"login" 					=> ["Authenticator_controller", "login"],
				"calendar-add_note"			=> ["Calendar_controller", "add"],
				"calendar-delete_note" 		=> ["Calendar_controller", "delete"],
				"create_account"			=> ["Authenticator_controller", "create"],
				"home-update_text"			=> ["Home_controller", "update"],
				"coding-update_text"		=> ["Coding_project_controller", "update"],
				"hobby-update_text"			=> ["Hobby_project_controller", "update"],
				"home-add_blog_text"		=> ["Home_controller", "add"],
				"home-delete_blog_text"		=> ["Home_controller", "delete"],
				"hobby-add_project"			=> ["Hobby_project_controller", "add"]
			],
			"GET" => [
				"" 							=> ["Home_controller", "index"],
				"coding_projects" 			=> ["Coding_project_controller", "index"],
				"hobby_projects" 			=> ["Hobby_project_controller", "index"],
				"calendar"					=> ["Calendar_controller", "index"],
				"login"						=> ["Authenticator_controller", "index"],
				"logout"					=> ["Authenticator_controller", "logout"],
				"error-404"					=> ["Error_controller", "error_404"],
				"error-500"					=> ["Error_controller", "error_500"],
				"create_account"			=> ["Authenticator_controller", "create_account_view"],
				"create_account-successful"	=> ["Authenticator_controller", "creation_successful_view"],
				"home-update_text"			=> ["Home_controller", "update_view"],
				"coding-update_text"		=> ["Coding_project_controller", "update_view"],
				"hobby-update_text"			=> ["Hobby_project_controller", "update_view"],
				"home-add_blog_text"		=> ["Home_controller", "add_view"],
				"hobby-add_project"			=> ["Hobby_project_controller", "add_view"]
			]
	];

	public function __construct() {

		$url = $this->get_url();
		// Url is split in parts by "/" and added to array
		$url = $this->parse_url($url);
		// get the request method
		$request_method = $_SERVER["REQUEST_METHOD"];

		// If page url can't be found, show 404
		if (!isset(self::ROUTING_TABLE[$request_method][$url[0]])) {
			header("Location: " . site_url("error-404"));
		}

		// Based on the page url, get controller name and method name
		$controller_name = $this->get_controller_name($url, $request_method);
		$method_name = $this->get_method_name($url, $request_method);

		// If page url has no action, continue to page
		if (count($url) == 1) {
			$this->continue_to_page($controller_name, $method_name);
		// If page url has parameters, save parameters and continue to page and pass on the parameters
		} elseif (count($url) == 2) {
			$params = $this->get_params($url, $request_method);
			$this->continue_to_page($controller_name, $method_name, $params);
		} else {
			header("Location: " . site_url("error-404"));
		}
	}

	private function get_url() : string {

		$url = "";
		if (isset($_GET["url"])) {
			$url = $_GET["url"];
        }
        return $url;
	}


	private function parse_url( string $url ) : array {

		$partitioned_url = explode("/", rtrim($url, "/"));
		return $partitioned_url;
	}


	protected function get_controller_name( array $url, string $method ) : string {

		$page_name = $url[0];
		$controller_name = self::ROUTING_TABLE[$method][$page_name][0];

		return $controller_name;
	}

	protected function get_method_name( array $url, string $method ) : string {

		$page_name = $url[0];
		$method_name = self::ROUTING_TABLE[$method][$page_name][1];

		return $method_name;
	}


	protected function get_params( array $url, string $method ) : string {

		$params = $url[1];

		return $params;
	}


	protected function continue_to_page( string $controller_name, string $method_name, string $params = "" ) : void {

		Authenticator::start_session();

		$controller = new ("app\Controllers\\" . $controller_name)();

		if ($method_name == "delete") {
			$controller->$method_name($params);
		} else {
			$controller->$method_name();
		}
	}
}
