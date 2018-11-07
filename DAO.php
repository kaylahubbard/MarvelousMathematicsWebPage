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
	
	//Checks the username
	public function getUsername($name){
		$conn=$this->getConnection();
		$q=$conn->prepare("SELECT username FROM user WHERE username='$name'");
		$q->bindParam(":username", $name);
		$q->setFetchMode(PDO::FETCH_ASSOC);
		$q->execute();
		$result=$q->fetchAll();
		return $result;
	}
	
	//checks username and password
	public function getUserPassword($name, $pass){
		$conn=$this->getConnection();
		$q=$conn->prepare("select username from user where username='$name' and password='$pass'");
		$q->bindParam(":username", $name);
		$q->bindParam(":password", $pass);
		$q->setFetchMode(PDO::FETCH_ASSOC);
		$q->execute();
		$result=$q->fetchAll();
		return $result;
	}
	
	//Saves the contact form information
	public function saveContact($name, $email, $message){
		$conn=$this->getConnection();
		$saveQuery= 
			"INSERT INTO contact (name, email, message) VALUES (:name, :email, :message)";
		$q=$conn->prepare($saveQuery);
		$q->bindParam(":name", $name);
		$q->bindParam(":email", $email);
		$q->bindParam(":message", $message);
		$q->execute();
	}
	
	//Saves the form data from submitting a lesson
	public function saveLesson($name, $Gk5, $G68, $G912, $description){
		$conn=$this->getConnection();
		$saveQuery=
			"INSERT INTO lesson (lessonname, gradek_5, grade6_8, grade9_12, description) 
				VALUES (:name, :gradek_5, :grade6_8, :grade9_12 :description)";
		$q=$conn->prepare($saveQuery);
		echo $q;
		exit;
	}
		/*
		$q->bindParam(":name", $name);
		$q->bindParam(":description", $description);
		$q->bindParam(":gradek_5", $Gk5);
		$q->bindParam(":grade6_8", $G68);
		$q->bindParam(":grade9_12", $G912);
		$q->execute();
	}
	
	public function getLessons(){
		$conn=$this->getConnection();
		$q=$conn->prepare("select lessonid, lessonname, gradek_5, grade6_8, grade9_12, description from lesson order by date_entered desc");
		$q->setFetchMode(PDO::FETCH_ASSOC);
		$q->execute();
		$result=$q->fetchAll();
		return $result;
	}
}
