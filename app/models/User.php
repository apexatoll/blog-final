<?php namespace models;

class User extends Model{
	public function __construct(){
		parent::__construct("users");
	}
	public function user_exists($username){
		return count($this
			->select(["username"=>$username])) > 0;
	}
	public function email_exists($email){
		return count($this->select(["email"=>$email])) > 0;
	}
	public function create($data){
		//$this->insert($data);
	}

}

