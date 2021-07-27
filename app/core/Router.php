<?php namespace core;

class Router {
	public function get($path, $callback){
		$this->add_route("GET", $path, $callback);
	}
	public function post($path, $callback){
		$this->add_route("POST", $path, $callback);
	}
	private function add_route($method, $path, $cb){
		$this->routes[$method][]= new Route($path, $cb);
	}
	public function route(){
		$uri    = $this->get_uri();
		$method = $this->get_method();
		$route  = $this->get_route($method, $uri);
		$this->execute($route, $uri);
	}
	private function get_uri(){
		return $_SERVER['REQUEST_URI'];
	}
	private function get_method(){
		return $_SERVER['REQUEST_METHOD'];
	}
	private function get_route($method, $uri){
		foreach($this->routes[$method] as $route)
			if($route->matches_uri($uri)) 
				return $route;
	}
	private function execute($route, $uri){
		try {
			$msg = $route->execute($uri);
			if($msg)
				Response::success($msg);
		}
		catch(\Exception $e){
			Response::error($e->getMessage());
		}
	}
}
