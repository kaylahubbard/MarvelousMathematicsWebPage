<?php $thisPage="Submit A Lesson"; ?>
<html>
	<?php require_once "MMHeader.php"; ?>
	
	<body>
		<div class="content">
			Submit a Lesson!<br>
			<form>
				Lesson Name:
				<input type="text"><br>
				Good For Levels:
				<input type="checkbox" name="k-5">K-5
				<input type="checkbox" name="6-8">6-8
				<input type="checkbox" name="9-12">9-12<br>
				Lesson Description:<br>
				<textarea id="message"></textarea><br>
				Upload File:
				<input type="file" name="lessonFile">
			</form>
		</div>
		<?php require_once "MMFooter.php"; ?>
	</body>
</html>