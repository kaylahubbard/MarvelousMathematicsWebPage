<?php

class DAO {
	
	private $host = "us-cdbr-iron-east-01.cleardb.net";
	private $userName = "b4c161f1606bdb";
	private $dataBase = "heroku_74e889dbb88746c";
	private $password = "228f00f4";
	
	public function getConnection () {
    return
      new PDO("mysql:host={$this->host};dbname={$this->dataBase}", $this->userName, $this->password);
	}
	
	public function saveLogin($name, $pass){
			$conn = $this->getConnection();
			$saveQuery = 
				"INSERT INTO user (name, pass) VALUES (:name, :pass)";
			$q = $conn->prepare($saveQuery);
			$q ->bindParam(":name", $name);
			$q ->bindParam(":pass", $pass);
			$q ->execute();
	
	}
	
	public function getUser(){
		$conn = $this->getConnection();
		return $conn->query("select username from user", PDO::FETCH_ASSOC);
	}
	
	public function getPass(){
		$conn = $this->getConnection();
		return $conn->query("select password from user", PDO::FETCH_ASSOC);
	}
	
	public function saveContact($name, $email, $message){
			$conn = $this->getConnection();
			$saveQuery = 
				"INSERT INTO contact (name, email, message) VALUES (:name, :email, :message)";
			$q = $conn->prepare($saveQuery);
			$q ->bindParam(":name", $name);
			$q ->bindParam(":email", $email);
			$q ->bindParam(":message", $message);
			$q ->execute();
	
	}
	
}
