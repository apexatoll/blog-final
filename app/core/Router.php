<?php namespace core;

class Router {
	public function get($path, $callback){
		$this->add_route("GET", $path, $callback);
	}
	public function route(){
		$uri    = $this->get_uri();
		$method = $this->get_method();
		$route  = $this->get_matching_route($method, $uri);
		$route->execute($uri);
	}
	private function get_matching_route($method, $uri){
		foreach($this->routes[$method] as $route)
			if($route->matches_uri($uri))
				return $route;
	}
	private function add_route($method, $path, $callback){
		$this->routes[$method][]= new Route($path, $callback);
	}
	private function get_method(){
		return $_SERVER['REQUEST_METHOD'];
	}
	private function get_uri(){
		return $_SERVER['REQUEST_URI'];
	}
}
