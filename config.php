<?php
trait Config {
	
	protected $config = [
		'example' => 'value'
	];

	protected $routes = [
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

	protected $db = [
		"hostname" => "127.0.0.1",
		"username" => "root",
		"password" => "",
		"dbname"     => "local"
	];
	
    function pattern_default ($path) {
		$this->model('Example', $this->db);
		$this->include('header');
		$this->include($path);
		$this->include('footer');
	}
	
	function pattern_blank ($path) {
		$this->include($path);
	}
	
	function pattern_error ($path) {
		http_response_code(404);
		$this->include('header');
		$this->include('error');
		$this->include('footer');
	}
	
}