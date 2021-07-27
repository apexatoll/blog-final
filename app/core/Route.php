<?php namespace core;

class Route {

	private $pattern, $p_holds, $controller, $method;

	public function __construct($path, $callback){
		$this->pattern = $this->convert_path($path);
		$this->p_holds = $this->extract_p_holds($path);
		[$this->controller, $this->method] = 
			$this->parse_callback($callback);
	}
	public function matches_uri($uri){
		return preg_match($this->pattern, $uri) != 0;
	}
	public function execute($uri){
		return call_user_func_array(
			[$this->controller, $this->method], 
			[$this->get_args($uri)]
		);
	}
	private function convert_path($path){
		return "%^".preg_replace("/:[A-z]+/", "(.+)", $path)."$%";
	}
	private function extract_p_holds($path){
		preg_match("/(?<=:)[A-z]+/", $path, $match);
		return count($match) > 0 ? $match : null;
	}
	private function parse_callback($callback){
		$split  = explode("#", $callback);
		$ctrl   = "controllers\\".array_shift($split);
		$method = array_shift($split);
		return [new $ctrl, $method];
	}
	private function get_args($uri){
		return isset($this->p_holds) ? 
			$this->extract_vars($uri) : $_POST;
	}
	private function extract_vars($uri){
		preg_match_all($this->pattern, $uri, $vars);
		return array_combine($this->p_holds, $vars[1]);
	}
}
