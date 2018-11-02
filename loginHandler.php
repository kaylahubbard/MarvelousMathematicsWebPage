<?php

	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$message = array();
	$bad = false;
	
	$_SESSION['presets']['username'] = $username;
	
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
	
	//All is good
	unset($_SESSION['presets']);
	
	require_once 'DAO.php';
	
	$dao = new DAO();

	if(isset($_POST['createButton'])){
		$user=$dao->getUsername($username);		

		//if the number of rows in my table with that username are zero, then create a row for the username and password.
		if($user){	
			$dao->saveLogin($username, $password);
			header('Location: MMAbout.php');
			exit;
		}else{
			$_SESSION['message'][]= "That username already exists";
			header('Location: MMLogin.php');
			exit;
		}
	}else if (isset($_POST['loginButton'])){
		$login=$dao->getUserPassword($username, $password);
		if($login){
			header('Location: MMAbout.php');
			exit;
		}else{
			$_SESSION['message'][] = "Username or Password is incorrect.";
			header('Location: MMLogin.php');
			exit;
		}
	}	
	
	//header('Location: MMLogin.php');
	exit;
	
?>
	
