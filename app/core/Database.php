<?php namespace core;

class Database {
	private $host, $user, $pass, $name;
	public function __construct($host="127.0.0.1", 
		$user="root", $pass="", $name="code"){
		$this->host = $host;
		$this->user = $user;
		$this->pass = $pass;
		$this->name = $name;
		$this->pdo  = $this->get_PDO();
	}
	private function DSN(){
		return "mysql:host=$this->host;dbname=$this->name";
	}
	private function get_PDO(){
		return new \PDO($this->DSN(), $this->user, $this->pass);
	}
}
