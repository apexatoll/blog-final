<?php namespace core;

class SQL {
	public static function select($table, $where=null, $cols = "*"){
		return "SELECT $cols FROM $table"
			.self::where_string($where);
	}
	private static function where_string($where){
		return isset($where) ? " WHERE ".
			implode(" AND ", self::placeholder($where)) :
			null;
	}
	private static function placeholder(array $data){
		foreach(array_keys($data) as $col)
			$a[]= "$col = :$col";
		return $a;
	}
}
