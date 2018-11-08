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
					$grade = "";
					if($lesson['gradek_5']==1){
							$grade = "K-5";
					}
					if($lesson['grade6_8'] == 1){
						$grade = $grade." 6-8";
					}
					if($lesson['grade9_12']){
						$grade = $grade." 9-12";
					}
					
					echo "<tr>
							<td>
								Lesson: " . htmlentities($lesson['lessonname']) . "<br>
								Content Level: ".$grade.  "<br>
								Description: " . htmlentities($lesson['description']) . "<br><br>
								<hr>
							</td>							
						</tr>";
				}
			?>
		</table>
		<?php require_once "MMFooter.php"; ?>
	</body>
</html>