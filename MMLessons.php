<?php $thisPage="Lessons"; ?>
<html>
	<?php
	session_start();
	require_once "MMHeader.php";
	require_once "DAO.php";
	
	if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
		header('Location: MMLogin.php');
		exit;
	}
	
	$dao = new DAO();
	$lessons = $dao->getLessons();
	
	?>
	
	<body>
		<table>
		
		<?php
			foreach ($lessons as $lesson) {
				echo $lesson['gradek_5'];
				/*
				echo "<tr>
							<td>Lesson: " . htmlentities($lesson['lessonname']) . "/></td>
							<td>Content: " . if($lesson['gradek_5']){ . " K-5 ."}."</td>
							<td>Description: ". htmlentities($lesson['description'])."</td>
							<td>Attached File: ".{$lesson['lessonFile']}."</td>
					</tr>";*/
					
			}
		?>
			
		</table>
		<?php require_once "MMFooter.php"; ?>
	</body>
</html>