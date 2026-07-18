<?php
	require "session_auth.php";
	$rand = bin2hex(openssl_random_pseudo_bytes(16));
	$_SESSION["nocsrftoken"] = $rand;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>WAPH-Change Password Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Change Password</h1>
	<form action="changepassword.php" method="POST" class="form login">
		Username:<!--input type="text" class="text_field" name="username" /--> <?php echo htmlentities($_SESSION["username"]); ?> <br>
		New Password: <input type="password" class="text_field" name="newpassword"
			required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&amp;])[\w!@#$%^&amp;]{8,}$"
			title="Password must have at least 8 characters with 1 special symbol !@#$%^&amp;, 1 number, 1 lowercase, and 1 UPPERCASE"
			placeholder="Your new password"
			onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : ''); form.renewpassword.pattern = this.value;" /> <br>
		Retype New Password: <input type="password" class="text_field" name="renewpassword"
			required
			title="Password does not match"
			placeholder="Retype your new password"
			onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');" /> <br>
		<input type="hidden" name="nocsrftoken" value="<?php echo $rand; ?>" />
		<button class="button" type="submit">Change Password</button>
	</form>
	<p class="form-footer-link"><a href="index.php">Home</a> | <a href="logout.php">Logout</a></p>
</body>
</html>