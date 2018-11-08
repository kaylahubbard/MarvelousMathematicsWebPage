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
								<td>Lesson: " . htmlentities($lesson['lessonname']) . "/></td>
								<td>Description: " . htmlentities($lesson['description']) . "</td>
								<td>Attached File: " . $lesson['lessonFile'] . "</td>
						</tr>";
						
				}
			?>
			<tr>
				<td>
				Lesson: will pull the lesson name from a submission.<br>
				Content Level: will pull the level from a submission.<br>
				Description: will pull the description from a submission.<br>
				Attached File: will pull the file from a submission.<br>
				<?php echo $lessons;?>
				</td>
			</tr>
		</table>
		<?php require_once "MMFooter.php"; ?>
	</body>
</html>