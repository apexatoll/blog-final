<?php namespace core;

class Loader {
	public static function initialize(){
		spl_autoload_register(function($class){
			$path = self::make_path($class);
			if(file_exists($path)) require_once($path);
		});
	}
	private static function make_path($class){
		return App."/".self::parse_class($class).".php";
	}
	private static function parse_class($class){
		return str_replace("\\", DIRECTORY_SEPARATOR, $class);
	}
}
