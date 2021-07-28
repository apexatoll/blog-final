<?php namespace controllers;

class Pages extends Controller {
	protected function view_path($file){
		return parent::view_path("pages/$file");
	}
	public function index(){
		$this->view("index", ["title"=>"home"]);
	}
	public function contact(){
		$this->view("contact", ["title"=>"contact"]);
	}
	public function about(){
		$this->view("about", ["title"=>"about"]);
	}
	public function posts($params){
		$this->view("posts", 
			array_merge($params, ["title"=>"posts"]));
	}
}
