<?php $thisPage="About"; ?>
<html>
	<?php require_once "MMHeader.php"; ?>
	
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
				?>
				<?php } ?>	
				<form>
					Name:
					<input type="text" name="name"><br>
					Email:
					<input type="email" name="email"><br>
					Message:<br>
					<textarea id="message" name="message"></textarea>
			</div></td>
		</tr>
		</table>
		<?php require_once "MMFooter.php"; ?>
	</body>
</html>