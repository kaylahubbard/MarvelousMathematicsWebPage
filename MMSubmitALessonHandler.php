<?php

	session_start();
	$lesson = $_POST['lesson'];
	$Gk5 = $_POST['k-5'];
	$G68 = $_POST['6-8'];
	$G912 = $_POST['9-12'];
	$description = $_POST['description'];
	
	$message = array();
	$bad = false;
	
	$_SESSION['presets']['lesson'] = $lesson;
	$_SESSION['presets']['description'] = $description;
	$_SESSION['presets']['Gk5'] = $Gk5;
	$_SESSION['presets']['G68'] = $G68;
	$_SESSION['presets']['G912'] = $G912;
	
	
	$filePath = '';
	if (count($_FILES) > 0) {
		if ($_FILES["lessonfile"]["error"] > 0) {
			throw new Exception("Error: " . $_FILES["lessonfile"]["error"]);
		} else {
			$basePath = "\Users\kayla\cs516";
			$filePath = "\tempFiles" . $_FILES["lessonfile"]["name"];
				if (!move_uploaded_file($_FILES["lessonfile"]["tmp_name"], $basePath . $filePath)) {
					throw new Exception("File move failed");
				}
		}
	}
	
	if($Gk5 == "k-5"){
		$Gk5bit = true;
	}else{
		$Gk5bit = false;
	}
	
	if($G68 == "6-8"){
		$G68bit = true;
	}else{
		$G68bit = false;
	}
	
	if($G912 == "9-12"){
		$G912bit = true;
	}else{
		$G912bit = false;
	}
	
	if(empty($lesson)){
		$_SESSION['message'][] = "Lesson name is required";
		$bad = true;
	}
	
	if(empty($description)){
		$_SESSION['message'][] = "A description is required";
		$bad = true;
	}
	
	if($bad){
		header('Location: MMSubmitALesson.php');
		exit;
	}
	
	unset($_SESSION['presets']);
	
	require_once 'DAO.php';
	$dao = new DAO();
	
	if(isset($_POST['submit'])){
		$dao->saveLesson($lesson, $Gk5bit, $G68bit, $G912bit, $description, $filePath);
		$_SESSION['message'][]="Thanks for submitting!";
		header('Location: MMSubmitALesson.php');
		exit;
	}else{
		$_SESSION['message'][]="Something went wrong";
		header('Location" MMSubmitALesson.php');
		exit;
	}
	
	
	exit;