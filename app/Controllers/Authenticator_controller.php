<?php

namespace app\Controllers;

use app\{
    Core\Controller,
    Models\User_model,
    Models\Model
};


class Authenticator_controller extends Controller {

    protected Model $user;

    public function __construct() {

        parent::__construct();
        $this->user = new User_model();
    }


    public function index() : void {

        $user_params = $this->auth->get_user_session_params();

        $this->view->view("authentication/login", [
            "title" => "Ropaz.dev - Kirjaudu",
            "user_params" => $user_params
        ]);
    }


    public function login() : void {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $login_successful = $this->login_successful($username, $password);

        if ($login_successful == true) {
            header ("Location: " . site_url("calendar"));
        } else {
            header("Location: " . site_url("login?error=login_failed"));
        }
    }


    public function login_successful( string $username, string $password ) : bool {

        // If fetching user id fails, then id is null
        $user_info = $this->user->get_user_info($username, $password);

        if (empty($user_info)) {
            return false;
        }

        // start user session
        $logged_in = true;
        $this->auth->start_user_session($logged_in, $user_info["user_id"], $user_info["is_admin"], $username);

        return true;
    }


    public function logout() : void {
    
        // Unset all of the session variables, delete cookies and end session
        $this->auth->unset_user_session();
        $this->auth->delete_session_cookies();
        $this->auth->end_session();

        header ("Location: " . site_url(""));
    }


    public function create_account_view() : void {

        $user_params = $this->auth->get_user_session_params();

        $this->view->view("authentication/create_account", [
            "title" => "Ropaz.dev - Luo tunnus",
            "user_params" => $user_params
        ]);
    }


    public function create() : void {

        $username = $_POST['username'];
        $password = $_POST['password'];

        if (strlen($password) < 10) {
            header ("Location: " . site_url("create_account?error=creation_failed"));
        } elseif (!$password || !$username) {
            header ("Location: " . site_url("create_account?error=creation_failed"));
        } else {
            $creation_successful = $this->user->add_user($username, password_hash($password, PASSWORD_BCRYPT));
            if ($creation_successful) {
                header ("Location: " . site_url("create_account-successful"));
            } else {
                header ("Location: " . site_url("create_account?error=creation_failed"));
            }
        }
    }


    public function creation_successful_view() : void {

        $user_params = $this->auth->get_user_session_params();

        $this->view->view("authentication/creation_successful", [
            "title" => "Ropaz.dev - Tunnukset luotu",
            "user_params" => $user_params
        ]);
    }
}
