<?php namespace controllers;

class Popup extends Controller {
	protected function view_path($file){
		return parent::view_path("popups/$file");
	}
	public function signup(){
		$this->view("signup");
	}
}
