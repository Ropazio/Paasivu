<?php

namespace app\Core;

use app\{
    Core\View,
    Core\Authenticator,
    Models\Model
};


class Controller {

    protected View $view;
    protected Model $model;
    protected Authenticator $auth;

    public function __construct() {

        $this->view = new View();
        $this->model = new Model();
        $this->auth = new Authenticator();
    }
}
