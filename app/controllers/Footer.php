<?php namespace controllers;

class Footer extends Controller {
	private $prompt = [
		"default" => "Not logged in: ",
		"login" => "Not logged in: "
	];
	public function default(){
		$this->view("default", ["screen"=>"default"]);
	}
	protected function view_path($file){
		return parent::view_path("footer/$file");
	}
	public function prompt($tag){
		return $this->prompt[$tag];
	}
	public function show($params){
		$this->view($params['screen'], $params);
	}
}
