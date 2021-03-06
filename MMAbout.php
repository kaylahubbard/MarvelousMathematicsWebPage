<?php $thisPage="About"; ?>
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
		<table>
		<tr>
			<td><div class="about">
				This website is a place for math teachers to share ideas
				on awesome lessons that they use in their classrooms. One
				of the biggest phrases that teachers always hear when it
				comes to lesson creation is, "Do not recreate the wheel".
				So this is a place to help you to not recreate the wheel!
			</div></td>
		
			<td><div class="contact">
				Contact us!
				<?php if (isset($_SESSION['message'])){
					foreach($_SESSION['message'] as $messages){?>
				<div class="message">
					<?php echo $messages; ?>
				</div>
				<?php }
					unset($_SESSION['message']);
				} ?>	
				<form method=POST action=MMContactHandler.php>
					<label for="name">Name:</label>
					<input type="text" id="name" name="name" value="<?php echo isset($_SESSION['presets']['name']) ? $_SESSION['presets']['name'] : ''; ?>"><br>
					<label for="email">Email:</label>
					<input type="email" id="email" name="email" value="<?php echo isset($_SESSION['presets']['email']) ? $_SESSION['presets']['email'] : ''; ?>"><br>
					<label for="message">Message:</label><br>
					<textarea id="message" name="message"><?php echo isset($_SESSION['presets']['msg']) ? $_SESSION['presets']['msg'] : ''; ?></textarea><br>
					<input type = "submit" value = "Submit" name="submit">
			</div></td>
		</tr>
		</table>
		<?php require_once "MMFooter.php"; ?>
	</body>
</html>