<?php namespace controllers;

class Users extends Controller {
	protected $required_fields = ["name", "username", "email", "password", "confirm-password" ];

	public function __construct(){
		$this->model = new \models\User();
	}
	public function register($input){
		$this->validate_registration($input);
		return "You can now log in!";
	}
	private function validate_registration($input){
		$this->validate_empty_fields($input);
		$this->validate_email($input['email']);
		$this->validate_passwords($input);
		$this->validate_unique($input);
	}
	private function validate_email($email){
		if(!$this->valid_email($email))
			throw new \Exception("Invalid email");
	}
	private function valid_email($email){
		$c = "A-z0-9\.\-";
		$r = "/^[$c]+@[$c]+\.[A-z0-9]+$/";
		return preg_match($r, $email);
	}
	private function validate_passwords($input){
		if($input['password'] !== $input['confirm-password'])
			throw new \Exception("Passwords do not match");
	}
	private function validate_unique($input){
		$this->uniq_username($input['username']);
		$this->uniq_email($input['email']);
	}
	private function uniq_username($username){
		if($this->model->user_exists($username))
			throw new \Exception("username exists");
	}
	private function uniq_email($email){
		if($this->model->email_exists($email))
			throw new \Exception("email exists");
	}
}
