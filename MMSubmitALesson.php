<?php $thisPage="Submit A Lesson"; ?>
<html>
	<?php 
		session_start();
		require_once "MMHeader.php"; 
	?>
	
	<body>
		<div class="content">
			Submit a Lesson!<br>
			<?php if (isset($_SESSION['message'])){
					foreach($_SESSION['message'] as $messages){?>
				<div class="message">
					<?php echo $messages; ?>
				</div>
			<?php }
				unset($_SESSION['message']);
			?>
			<?php } ?>
			<form method=post action=MMSubmitALessonHandler.php>
				Lesson Name:
				<input type="text" name="lesson" value="<?php echo isset($_SESSION['presets']['lesson']) ? $_SESSION['presets']['lesson'] : ''; ?>"><br>
				Good For Levels:
				<input type="checkbox" name="k-5" value="k-5">K-5
				<input type="checkbox" name="6-8" value="6-8">6-8
				<input type="checkbox" name="9-12" value="9-12">9-12<br>
				Lesson Description:<br>
				<textarea id="message" name="description">
					<?php echo isset($_SESSION['presets']['description']) ? $_SESSION['presets']['description'] : ''; ?>
				</textarea><br>
				Upload File:
				<input type="file" name="lessonFile"><br>
				Submit:
				<input type="submit" value="Submit">
			</form>
		</div>
		<?php require_once "MMFooter.php"; ?>
	</body>
</html>