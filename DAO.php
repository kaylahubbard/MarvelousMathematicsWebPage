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
			$conn=$this->getConnection();
			$saveQuery = 
				"INSERT INTO user (username, password) VALUES (:username, :password)";
			$q=$conn->prepare($saveQuery);
			$q->bindParam(":username", $name);
			$q->bindParam(":password", $pass);
			$q->execute();
	
	}
	
	public function getUser(){
		$conn=$this->getConnection();
		return $conn->query("SELECT username FROM user", PDO::FETCH_ASSOC);
	}
	
	//Checks the username
	public function getUsername($name){
		$conn=$this->getConnection();
		$q=$conn->prepare("SELECT count(*) FROM user WHERE username=:username");
		$q->bindParam(":username", $name);
		$q->setFetchMode(PDO::FETCH_ASSOC);
		$q->execute();
		$result->$q->fetchAll();
		return $result;
	}
	
	//checks username and password
	public function getUserPassword($username, $password){
		$conn=$this->getConnection();
		$q=$conn->prepare("select username from user where username=:username and password = :password");
		$q->bindParam(":username", $username);
		$q->bindParam(":password", $password);
		$q->setFetchMode(PDO::FETCH_ASSOC);
		$q->execute();
		$result->$q->fetchAll();
		return $result;
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
			$q->bindParam(":name", $name);
			$q->bindParam(":email", $email);
			$q->bindParam(":message", $message);
			$q->execute();
	
	}
/*
	public function saveLesson($name, $description){
		$conn=$this->getConnection();
		$saveQuery= " INSERT INTO lesson (name, description) VALUES (:name, :description)";
		$q=$conn->prepare($saveQuery);
		$q->bindParam(":name", $name);
		$q->bindParam(":description", $description);
	}
*/
	
}
