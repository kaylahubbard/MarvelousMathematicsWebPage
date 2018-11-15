<html>
	<head>
		<link rel="stylesheet" href="MMStyles.css">
		<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
		<link rel="icon" type="image/jpg" href="favicon.jpg">
		<title>
			Marvelous Mathematics
		</title>
	</head>
	
	<body>
	
		<h1>
			<div class = "logo">
				<a href="logout.php">
					<img src="logo.jpg">
				</a><br>
				Logout
			</div>
			
		</h1>
		
		<div class="headers">
			A place for teachers to share great mathematical activities!
		</div>
		<div class = "navBar">
			<ul>
				<li <?php if ($thisPage=="About") echo " id=\"currentpage\""; ?>>
					<a href="MMAbout.php">About</a></li>
				<li <?php if ($thisPage=="Lessons") echo " id=\"currentpage\""; ?>>
					<a href="MMLessons.php">Lessons</a></li>
				<li <?php if ($thisPage=="Submit A Lesson") echo " id=\"currentpage\""; ?>>
				<a href="MMSubmitALesson.php">Submit a Lesson</a></li>
			</ul>
		</div>
	</body>

</html>