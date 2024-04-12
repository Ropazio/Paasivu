<?php

require_once "../app/Core/Authenticator.php";
require_once "../app/helpers.php";

class Router {

	//ROUTING TABLE = ["page" => [controller, action, method/function]]
		const ROUTING_TABLE = [
			"POST" => [
				"login" 				=> ["Authenticator_controller", "" ,"login"],
				"calendar-add_note"		=> ["Calendar_controller", "add_note", "add"],
				"calendar-delete_note" 	=> ["Calendar_controller", "delete_note", "delete"],
			],
			"GET" => [
				"" 						=> ["Home_controller", "", "index"],
				"net_projects" 			=> ["Coding_project_controller", "", "index"],
				"hobby_projects" 		=> ["Hobby_project_controller", "", "index"],
				"calendar"				=> ["Calendar_controller", "", "index"],
				"login"					=> ["Authenticator_controller", "", "index"],
				"logout"				=> ["Authenticator_controller", "", "logout"]
			]
	];

	public function __construct() {

		$url = $this->get_url();
		// url is split in parts by "/" and added to array
		$url = $this->parse_url($url);
		// get the request method
		$request_method = $_SERVER["REQUEST_METHOD"];

		if (!isset(self::ROUTING_TABLE[$request_method][$url[0]])) {
			header("Location: " . site_url(""));
		}

		$controller_name = $this->get_controller_name($url, $request_method);
		$controller_path = $this->get_controller_path($controller_name);
		$method_name = $this->get_method_name($url, $request_method);
		if (count($url) > 1) {
			$params = $this->get_params($url, $request_method);
			if (empty($params)) {
				$this->continue_to_page($controller_name, $controller_path, $method_name);
			} else {
				$this->continue_to_page($controller_name, $controller_path, $method_name, $params);
			}
		} else {
			$this->continue_to_page($controller_name, $controller_path, $method_name);
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


	protected function get_controller_path( string $controller_name ) : string {

		$controller_path = "../app/Controllers/" . $controller_name . ".php";

		if (!file_exists($controller_path)) {
			// Add error handler
			//header("Location: " . site_url("/") );
		}

		return $controller_path;
	}


	protected function get_method_name( array $url, string $method ) : string {

		$page_name = $url[0];
		$method_name = self::ROUTING_TABLE[$method][$page_name][2];

		return $method_name;
	}


	protected function get_params( array $url, string $method ) : string {

		$params = $url[1];

		return $params;
	}


	protected function continue_to_page( string $controller_name, string $controller_path, string $method_name, string $params = "" ) : void {

		Authenticator::start_session();

		require_once $controller_path;

		$controller = new $controller_name();

		if ($method_name == "delete") {
			$controller->$method_name($params);
		} else {
			$controller->$method_name();
		}
	}


	private function url_found( string $url ) : bool {

		if ($url == $pattern) {
			return true;
		}
		return false;
	}

}
