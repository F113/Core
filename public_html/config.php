<?php

$db = [
    "hostname" => "127.0.0.1",
    "username" => "root",
    "password" => getenv('MYSQL_ROOT_PASSWORD'),
    "dbname" => "dbtest"
];

$config = [
    'example' => 'value'
];

$routes = [
    "index"  => [
        "pattern" => "default",
        "data"    => [
            "title"       => "page title",
            "description" => "page description"
        ]
    ],		
    "error"  => "error",
    "ajax"   => "blank"
];

trait Patterns {

    function pattern_default ($path) {
		$this->model('Example', $this->db);
		$this->inc('header');
		$this->inc($path);
		$this->inc('footer');
	}

	function pattern_blank ($path) {
		$this->inc($path);
	}

	function pattern_error ($path) {
		http_response_code(404);
		$this->inc('header');
		$this->inc('error');
		$this->inc('footer');
	}
	
}