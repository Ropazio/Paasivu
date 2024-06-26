<?php

namespace app\Core;


class View {

    public function view( string $view_path, array $params = [] ) : void {

        $real_path = file_path("views") . $view_path . ".phtml";

        $snippets = $this->load_snippets($params);

        require_once $real_path;
    }


    public function load_snippets( array $params = [] ) : array {

        $snippets = [
        "navi",
        "footer",
        "header",
        "head_and_theme"
        ];

        $theme = $this->load_theme();
        $title = $params["title"];

        $results = [];

        foreach($snippets as $snippet_name) {
            ob_start();
            require(file_path("snippets") . $snippet_name . ".phtml");
            $results[$snippet_name] = ob_get_clean();
        }

        return $results;
    }


    public function load_theme() : string {

        $date = date("m");
        $summer_months = array(4, 5, 6, 7, 8);
        $christmas_months = array(12);

        if (in_array($date, $summer_months)) {
            return "summer_theme.css";
        } elseif (in_array($date, $christmas_months)) {
            return "christmas_theme.css";
        }

        return "supper_theme.css";
    }
}