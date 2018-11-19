<?php $thisPage="Submit A Lesson"; ?>
<html>
	<?php 
		session_start();
		require_once "MMHeader.php"; 
		
		if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
			header('Location: MMLogin.php');
			exit;
		}
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
				<label for="lessonName">Lesson Name/Activity:</label>
				<input type="text" id="lessonName" name="lesson" value="<?php echo isset($_SESSION['presets']['lesson']) ? $_SESSION['presets']['lesson'] : ''; ?>"><br>
				Good For Levels:
				<label for="k5">K-5</label>
				<input type="checkbox" id="k5" name="k-5" value="k-5">
				<label for="6_8">6-8</label>
				<input type="checkbox" id="6_8" name="6-8" value="6-8">
				<label for="9_12">9-12</label>
				<input type="checkbox" name="9-12" id="9_12" value="9-12"><br>
				<label for="message">Lesson Description:</label><br>
				<textarea id="message" name="description"><?php echo isset($_SESSION['presets']['description']) ? $_SESSION['presets']['description'] : ''; ?></textarea><br>
				Submit:
				<input type="submit" value="Submit" name="submit">
			</form>
		</div>
		<?php require_once "MMFooter.php"; ?>
	</body>
</html>
