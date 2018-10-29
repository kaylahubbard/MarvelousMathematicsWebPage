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
		
		$dao->saveLogin($username, $password);
		$user=$dao->getUsername($username);
		echo "here";
		/*
		if(empty($user)){
			echo "here too";
			$dao->saveLogin($username, $password);
			header('Location: MMAbout.php');
			exit;
		}
		$_SESSION['message'][]= "That username already exists";
		*/
		
	}else if (isset($_POST['loginButton'])){
		/*
		$login=$dao->getUserPassword($username, $password);
		if(!empty($login)){
			header('Location: MMAbout.php');
			exit;
		}else{
			$_SESSION['message'][] = "Username or Password is incorrect.";
			$bad = true;
			
		}
		*/
		
	}	
	
	//header('Location: MMLogin.php');
	exit;
	
?>
	
