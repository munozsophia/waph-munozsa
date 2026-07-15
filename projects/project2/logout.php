<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>WAPH-Logged Out Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	session_start();
	session_destroy();
?>
	<div class="form-card">
		<h1>You are logged out!</h1>
		<p class="form-footer-link"><a href="form.php">Login Again</a>
	</div>
</body>
</html>