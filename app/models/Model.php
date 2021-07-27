<?php namespace models;
	use \core\SQL;

class Model {
	public function __construct($table){
		$this->table = $table;
		$this->db = new \core\Database();
	}
	public function select($where=null, $cols="*"){
		$stmt = $this->stmt(
			SQL::select($this->table, $where, $cols));
		$stmt->execute($where);
		return $stmt->fetchAll(\PDO::FETCH_OBJ);
	}
	public function insert($values){
		$stmt = $this->stmt(
			SQL::insert($this->table, $values));
		$stmt->execute($values);
		return $this->last_id();
	}
	private function stmt($sql){
		return $this->db->pdo->prepare($sql);
	}
	private function last_id(){
		return $this->db->pdo->lastInsertId();
	}
}
