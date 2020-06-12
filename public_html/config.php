<?php

/******************************************************
*******************************************************
*******************************************************/

define("DB_HOSTNAME", getenv('MYSQL_HOST'));
define("DB_USERNAME", getenv('MYSQL_ROOT_USER'));
define("DB_PASSWORD", getenv('MYSQL_ROOT_PASSWORD'));
define("DB_NAME",     getenv('MYSQL_DATABASE'));

$routes = [
    "index" => [
        "pattern" => "default",
        "data" => [
            "title" => "page title",
            "description" => "page description"
        ]
    ],
    "error" => ["pattern" => "error"],
    "ajax" => ["pattern" => "blank"]
];

trait Patterns {

    function pattern_default($path) {
        //$this->model('Example', $this->db);
        $this->load('header');
        $this->load($path);
        $this->load('footer');
    }

    function pattern_blank($path) {
        $this->load($path);
    }

    function pattern_error($path) {
        http_response_code(404);
        $this->load('header');
        $this->load('error');
        $this->load('footer');
    }

}