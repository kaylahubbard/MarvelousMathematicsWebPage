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
	
	<body class="lessons">
		<div class="lesson">
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
					
					echo "<div>
							Lesson: " . htmlentities($lesson['lessonname']) . "<br>
							Content Level: ".$grade.  "<br>
							Description: " . htmlentities($lesson['description']) . "<br><br>
						</div>";
				}?>
		</div>
			
		<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="slick/slick.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$('.lesson').slick();
			});
		</script>
		
		<?php require_once "MMFooter.php"; ?>
	</body>
</html>