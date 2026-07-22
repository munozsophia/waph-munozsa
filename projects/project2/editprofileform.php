<?php
	require "session_auth.php";
	$rand = bin2hex(openssl_random_pseudo_bytes(16));
	$_SESSION["nocsrftoken"] = $rand;

	function get_profile_data($username) {
		$mysqli = new mysqli('localhost','munozsa' /*Database username*/, 'Sophia13_m' /*Database password*/,'waph' /*Database name*/);
		if ($mysqli->connect_errno) {
			printf("Database connection failed: %s\n", $mysqli->connect_error);
			exit();
		}
		$prepared_sql = "SELECT name, email FROM users WHERE username=?;";
		if (!$stmt = $mysqli->prepare($prepared_sql)) {
			echo "Prepare failed";
			exit();
		}
		$stmt->bind_param('s', $username);
		if (!$stmt->execute()) {
			echo "Execute failed";
			exit();
		}
		$name = NULL; $email = NULL;
		if (!$stmt->bind_result($name, $email)) echo "Binding failed";
		if ($stmt->fetch()) {
			return array("name" => $name, "email" => $email);
		}
		return NULL;
	}
	$profile = get_profile_data($_SESSION["username"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>WAPH-Edit Profile Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Edit Profile</h1>
	<form action="editprofile.php" method="POST" class="form login">
		Username: <?php echo htmlentities($_SESSION["username"]); ?> <br>
		Name: <input type="text" class="text_field" name="name"
			required
			value="<?php echo htmlentities($profile["name"]); ?>" /> <br>
		Email: <input type="text" class="text_field" name="email"
			required pattern="^[\w.-]+@[\w-]+(\.[\w-]+)*$"
			title="Please enter a valid email"
			value="<?php echo htmlentities($profile["email"]); ?>"
			onchange="this.setCustomValidity(this.validity.patternMismatch ? this.title : '');" /> <br>
	<input type="hidden" name="nocsrftoken" value="<?php echo $rand; ?>"/>
	<button class="button" type="submit">Save Changes</button>
	</form>
	<p class="form-footer-link"><a href="index.php">Home</a> | <a href="logout.php">Logout</a></p>
</body>
</html>