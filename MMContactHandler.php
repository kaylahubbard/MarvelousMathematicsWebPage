<?php

	session_start();
	$name = $_POST['name'];
	$email = $_POST['email'];
	$msg = $_POST['message'];
	
	$message = array();
	$bad = false;
	
	$_SESSION['presets']['name'] = $name;
	$_SESSION['presets']['email'] = $email;
	$_SESSION['presets']['msg'] = $msg;
	
	if(empty($name)){
		$_SESSION['message'][] = "Name is Required";
		$bad = true;
	}
	
	if(empty($email)){
		$_SESSION['message'][] = "Email is Required";
		$bad = true;
	}
	
	if(empty($msg)){
		$_SESSION['message'][] = "A message is required";
		$bad = true;
	}
	
	if($bad){
		header('Location: MMAbout.php');
		exit;
	}
	
	unset($_SESSION['presets']);
	
	require_once 'DAO.php';
	$dao = new DAO();
	
	if(isset($_POST['submit'])){
		$dao->saveContact($name, $email, $msg);
	}
	
	header('Location: MMAbout.php');
	exit;