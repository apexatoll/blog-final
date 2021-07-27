<?php namespace controllers;

class Controller {
	protected function view($file, $params = []){
		$params['file'] = $this->view_path($file);
		require_once($this->view_path("layout"));
	}
	protected function view_path($file){
		return App."/views/$file.php";
	}
	protected function box($title, $class=null){
		$class = $class ? "box $class" : "box";
		echo "<div class='$class'>";
		echo "<h2>$title</h2>";
		echo "<div class='content'>";
	}
	protected function close_box(){
		echo "</div>";
		echo "</div>";
	} 
	protected function validate_empty_fields($input){
		foreach($this->required_fields as $field)
			if(empty($input[$field]))
				throw new \Exception(str_replace("-", " ", $field)." empty");
	}
}

