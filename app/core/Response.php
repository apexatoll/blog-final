<?php namespace core;

class Response {
	public static function success($message=null){
		echo self::template(true, $message);
	} 
	public static function error($message=null){
		echo self::template(false, $message);
	} 
	private static function template($success, $message){
		return json_encode([
			"success" => $success, 
			"message" => $message
		]);
	}
}
