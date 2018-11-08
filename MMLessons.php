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
					echo "<tr>
							<td>
								Lesson: " . htmlentities($lesson['lessonname']) . "<br>
								Description: " . htmlentities($lesson['description']) . "<br>
								Attached File: " . $lesson['lessonFile'] . "<br><br>
							</td>	
						</tr>";
				}
			?>
		</table>
		<?php require_once "MMFooter.php"; ?>
	</body>
</html>