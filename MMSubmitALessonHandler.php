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
		if ($_FILES["file"]["error"] > 0) {
			echo"here first";
			exit;
			throw new Exception("Error: " . $_FILES["file"]["error"]);
		} else {
			echo "here";
			$basePath = "\Users\kayla\cs516";
			$imagePath = "\tempFiles" . $_FILES["file"]["name"];
				if (!move_uploaded_file($_FILES["file"]["tmp_name"], $basePath . $imagePath)) {
					throw new Exception("File move failed");
				}
		}
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
	
	if(isset('submit'){
		$dao->saveLesson($lesson, $Gk5, $G68, $G912, $description);
		$_SESSION['message'][]="Thanks for submitting!";
		header('Location: MMSubmitALesson.php');
		exit;
	}else{
		$_SESSION['message'][]="Something went wrong";
		header('Location" MMSubmitALesson.php');
		exit;
	}
	
	exit;