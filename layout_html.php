<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="styles.css">
	<title><?php echo $title; ?></title>
</head>
<body>

	<header><h1>Quiz App</h1></header>

	<nav>
		<a href="index.php">Home</a>
		<a href="index.php?action=end">End</a>
		<a id="next" href="index.php?action=play">Next</a>
		<a style="float:right;" href="javascript:about_dialog.showModal();">About</a>
	</nav>

	<main>
		<?php echo $output; ?>
	</main>

	<footer>
		Copyright 2023
	</footer>

	<dialog id="about_dialog">
		<form method="dialog">
			<p>Welcome to the quiz app!</p>

			<p>The app is coded using PHP 8.2, HTML, CSS and JavaScript and runs on a Apache HTTP Server 2.4. The app's data is stored in a MySQL Database. The <code>mysqli</code> extension is used for interaction with the MySQL Server.</p>

			<p>The app is started from the index.php page, and all actions are initiated from here. The app reads data from the database.</p>
			<div style="text-align:center;"><button>Ok</button></div>
		</form>
	</dialog>

</body>
</html>