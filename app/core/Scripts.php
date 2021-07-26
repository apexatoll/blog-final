<?php namespace core;

class Scripts {
	public static function jquery(){
		echo "<script src='https://code.jquery.com/jquery-3.6.0.js' integrity='sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=' crossorigin='anonymous'></script>";
	}
	public static function load(){
		foreach(self::js_classes() as $file)
			echo self::script("js/lib/".$file);
		echo self::script("js/main.js");
	}
	private static function js_path($file=null){
		return Root."/public/js/$file";
	}
	private static function script($path){
		return "<script src='$path' defer></script>";
	}
	private static function js_classes(){
		return array_diff(scandir(self::js_path("lib")), [".", ".."]);
	}
}
