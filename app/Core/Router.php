<?php

require_once "../app/Core/Authenticator.php";

class Router {

	const ROUTING_TABLE = [
		"POST" => [
			"login" 			=> ["Authenticator_controller", "login"],
			"add_note" 			=> ["Calendar_controller", "add"],
		],
		"GET" => [
			"" 					=> ["Home_controller", "index"],
			"net_projects" 		=> ["Coding_project_controller", "index"],
			"hobby_projects" 	=> ["Hobby_project_controller", "index"],
			"calendar"			=> ["Calendar_controller", "index"],
			"login"				=> ["Authenticator_controller", "index"],
			"logout"			=> ["Authenticator_controller", "logout"],
		],
		"DELETE" => [
			"delete_note" 		=> ["Calendar_controller", "delete"],
		]
	];

	public function __construct() {

		$url = $this->get_and_parse_url();

		if (!isset(self::ROUTING_TABLE[$url])) {
			//header("Location: /");
		}

		// get the request method (GET / POST)
		$method = $_SERVER["REQUEST_METHOD"];

		// TODO: Tarkista että $method / $url on olemassa ROUTING_TABLE:ssa, muuten näytä error 404!

		$controller_name = self::ROUTING_TABLE[$method][$url][0];
		$method_name = self::ROUTING_TABLE[$method][$url][1];

		$controller_path = "../app/Controllers/" . $controller_name . ".php";

		if (!file_exists($controller_path)) {
			//header("Location: /");
		}

		// start a session
		Authenticator::start_session();

		require_once $controller_path;

		$controller = new $controller_name();
		$controller->$method_name();
	}


	private function get_and_parse_url() : string {

		$url = "";
		if (isset($_GET["url"])) {
			$url = rtrim($_GET["url"], "/");
        }
        return $url;
	}

}
