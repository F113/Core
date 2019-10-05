<?php
define("CONFIG", array (
	'config_value' => 400,
	'max_value' => 1000
));

define("DB", array (
	"hostname" => "127.0.0.1",
	"username" => "root",
	"password" => "",
	"name"     => "local"
));

define ("PATTERNS", array (
	"index"  => "default",
	"error"  => "error",
	"ajax"   => "empty"
));

trait Patterns {
    function pattern_default ($path) {
		# Example : $this->model('example', $this::db);
		$this->model('example', DB);
		
		$this->include('header');
		$this->include($path);
		$this->include('footer');
	}
	
	function pattern_empty ($path) {
		$this->include($path);
	}
	
	function pattern_error ($path) {
		http_response_code(404);
		$this->include('header');
		$this->include('error');
		$this->include('footer');
	}
}