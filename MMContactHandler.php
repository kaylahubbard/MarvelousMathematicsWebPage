<?php

	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$msg = $_POST['message'];
	
	$message = array();
	$bad = false;
	
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
	
	require_once 'DAO.php';
	$dao = new DAO();
	
	$dao -> saveContact($name, $email, $msg);
	header('Location: MMAbout.php');
	exit;