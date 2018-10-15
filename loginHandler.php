<?php

	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$message = array();
	$bad = false;
	
	if(empty($username)){
		$_SESSION['message'][] = "Username is Required";
		$bad = true;
	}
	
	if(empty($password)){
		$_SESSION['message'][] = "Password is Required";
		$bad = true;
	}
	
	if($bad){
		header('Location: MMLogin.php');
		exit;
	}
	
	
	require_once 'DAO.php';
	$dao = new DAO();
	
	if(isset($_POST["Create Account"])){
		$dao -> saveLogin($username, $password);
		header('Location: MMAbout.php');
		exit;
	}else if (isset($_POST["Login"])){
		if($username == $dao->getUser() && $password == $dao->getPassword()){
			header('Location: MMAbout.php');
			exit;
		}else{
			$_SESSION['message'][] = "Username or Password is incorrect.";
		}
	}
	?>
	