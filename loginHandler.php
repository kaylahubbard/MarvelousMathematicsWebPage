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
	
	if (!preg_match('~[1-9]~', $password)||!preg_match('~[A-Z]~', $password)) {
		$_SESSION['message'][] = "Password must have at least one number and one uppercase letter."; 
		$bad=true;
	}
	
	if($bad){
		header('Location: MMLogin.php');
		exit;
	}
	
	require_once 'DAO.php';
	
	$dao = new DAO();

	if(isset($_POST['createButton'])){
		$user=$dao->getUsername($username);		
		if(empty($user)){			
			$dao->saveLogin($username, $password);
			$_SESSION['logged_in']=true;
			header('Location: MMAbout.php');
			exit;
		}else{
			$_SESSION['message'][]="That username already exists";
			$_SESSION['logged_in']=false;
			header('Location: MMLogin.php');
			exit;
		}
	}else if (isset($_POST['loginButton'])){
		$login=$dao->getUserPassword($username, $password);
		if($login){
			$_SESSION['logged_in']=true;
			header('Location: MMAbout.php');
			exit;
		}else{
			$_SESSION['message'][]="Username or Password is incorrect.";
			$_SESSION['logged_in']=false;
			header('Location: MMLogin.php');
			exit;
		}
	}	
	
	//All is good
	unset($_SESSION['presets']);
	
	//header('Location: MMLogin.php');
	exit;
	
?>
	
