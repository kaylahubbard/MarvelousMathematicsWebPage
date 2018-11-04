<?php $thisPage="Lessons"; ?>
<html>
	<?php require_once "MMHeader.php"; 
	
	if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
		header('Location: MMLogin.php');
		exit;
	}
	
	?>
	
	<body>
		<table>
			<tr>
				<td>
				Lesson: will pull the lesson name from a submission.<br>
				Content Level: will pull the level from a submission.<br>
				Description: will pull the description from a submission.<br>
				Attached File: will pull the file from a submission.<br>
				</td>
			</tr>
		</table>
		<?php require_once "MMFooter.php"; ?>
	</body>
</html>