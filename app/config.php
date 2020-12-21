<?php

$db_settings = [
    "db_hostname" => getenv('MYSQL_HOST'),
    "db_username" => getenv('MYSQL_USERNAME'),
    "db_password" => getenv('MYSQL_PASSWORD'),
    "db_name"     => getenv('MYSQL_DATABASE'),
    "db_port"     => getenv('MYSQL_PORT'),
];

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
        $this->load('header');
        $this->load($path, ['example' => 'this text will be available in $example variable']);
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