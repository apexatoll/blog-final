<?php namespace core;

class Route {
	public $path, $method, $pattern;
	public function __construct($path, $callback){
		$this->path     = $path;
		//$this->callback = $callback;
		[$this->controller, $this->method] = $this->parse_callback($callback);
		$this->pattern  = $this->convert_path($path);
		$this->placeholders = $this->extract_placeholders($path);
		//$this->controller = 
	}
	private function convert_path($path){
		return "%^".preg_replace("/:[A-z]+/", "(.+)", $path)."$%";
	}
	private function extract_placeholders($path){
		preg_match("/(?<=:)[A-z]+/", $path, $placeholders);
		return count($placeholders) > 0 ? $placeholders : null;
	}
	public function matches_uri($uri){
		return preg_match($this->pattern, $uri) != 0;
	}
	public function execute($uri){
		$args = $this->set_args($uri);
		call_user_func_array([$this->controller, $this->method], [$args]);
		//call_user_func_array($this->callback, [$args]);
	}
	private function set_args($uri){
		return isset($this->placeholders) ? 
			$this->extract_vars($uri) : [];
	}
	private function extract_vars($uri){
		preg_match_all($this->pattern, $uri, $vars);
		return $this->make_assoc($this->placeholders, $vars[1]);
	}
	private function make_assoc($keys, $values){
		return array_combine($keys, $values);
	}
	private function parse_callback($callback){
		$arr  = explode("#", $callback);
		$ctrl = "controllers\\".array_shift($arr);
		$method = array_shift($arr);
		return [new $ctrl, $method];
	}
}
