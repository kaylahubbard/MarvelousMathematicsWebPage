<html>
	<?php require_once "MMHeader.php"; 
	
	
	session_start();
	?>
	<body>
		<div class="content">
			Sign up to begin your search!
			
			<form method=POST action=loginHandler.php>
				Username:
				<input type="text" name="username"><br>
				Password:
				<input type="password" name="password"><br>
				<input type="submit" value="Create Account">
				<input type="submit" value="Login">
			</form>
		</div>
		<?php require_once "MMFooter.php"; ?>
	</body>
</html>