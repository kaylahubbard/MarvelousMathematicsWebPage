<html>
	<?php require_once "MMHeader.php"; 
	
	
	session_start();
	?>
	<body>
		<div class="content">
			Sign up to begin your search!
		<?php if (isset($_SESSION['message'])){
				foreach($_SESSION['message'] as $messages){?>
				<div class="message">
					<?php echo $messages; ?>
				</div>
				<?php }
					unset($_SESSION['message']);
				?>
		<?php } ?>		
			<form method=POST action=loginHandler.php>
				<label for="username">Username:</label>
				<input type="text" name="username" id="username" value="<?php echo isset($_SESSION['presets']['username']) ? $_SESSION['presets']['username'] : ''; ?>"><br>
				<label for="password">Password:</label>
				<input type="password" id="password" name="password"><br>
				<input type="submit" value="Create Account" name="createButton">
				<input type="submit" value="Login" name="loginButton">
			</form>
		</div>
		<?php require_once "MMFooter.php"; ?>
	</body>
</html>