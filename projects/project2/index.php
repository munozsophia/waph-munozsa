<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>WAPH-Home Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
	/* --- Session management --- */
	if (isset($_POST["remember"])) {
		$lifetime = 30 * 24 * 60 * 60; // 30 days
	} else {
		$lifetime = 15 * 60; // 15 mins
	}
	$path = "/";
	$domain = "munozsa.waph.io";
	$secure = TRUE;
	$httponly = TRUE;
	session_set_cookie_params($lifetime, $path, $domain, $secure, $httponly);
	session_start();

	if (isset($_POST["identifier"]) and isset($_POST["password"])) {
		$logged_in_user = checklogin_mysql($_POST["identifier"], $_POST["password"]);
		if ($logged_in_user !== FALSE) {
			$_SESSION["authenticated"] = TRUE;
			$_SESSION["username"] = $logged_in_user;
			$_SESSION["browser"] = $_SERVER["HTTP_USER_AGENT"];
		} else {
			session_destroy();
			echo "<script>alert('Invalid username/email or password');window.location='form.php';</script>";
			die();
		}
	}

	if (!isset($_SESSION["authenticated"]) or $_SESSION["authenticated"] != TRUE) {
		session_destroy();
		echo "<script>alert('You have not logged in. Please login first!');</script>";
		header("Refresh:0; url=form.php");
		die();
	}

	if ($_SESSION["browser"] != $_SERVER["HTTP_USER_AGENT"]) {
		session_destroy();
		echo "<script>alert('Session hijacking attack is detected!');</script>";
		header("Refresh:0; url=form.php");
		die();
	}

	function checklogin_mysql($identifier, $password) {
		$mysqli = new mysqli('localhost','munozsa' /*Database username*/,'Sophia13_m' /*Database password*/,'waph' /*Database name*/);
		if ($mysqli->connect_errno) {
			printf("Database connection failed: %s\n", $mysqli->connect_error);
			exit();
		}
		$sql = "SELECT username FROM users WHERE (username=? OR email=?) AND password=md5(?)";
		$stmt = $mysqli->prepare($sql);
		$stmt->bind_param("sss", $identifier, $identifier, $password);
		$stmt->execute();
		$stmt->bind_result($found_user);
		if ($stmt->fetch()) {
			return $found_user;
		}
		return FALSE;
	}

	function get_profile($username) {
		$mysqli = new mysqli('localhost','munozsa' /*Database username*/,'Sophia13_m' /*Database password*/,'waph' /*Database name*/);
		if ($mysqli->connect_errno) {
			printf("Database connection failed: %s\n", $mysqli->connect_error);
			exit();
		}
		$prepared_sql = "SELECT name, email FROM users WHERE username=?;";
		if (!$stmt = $mysqli->prepare($prepared_sql)) {
			echo "Prepare failed";
			exit();
		}
		$stmt->bind_param("s", $username);
		if (!$stmt->execute()) {
			echo "Execute failed";
			exit();
		}
		$name = NULL; $email = NULL;
		if (!$stmt->bind_result($name, $email)) echo "Binding failed";
		if ($stmt->fetch()) {
			echo "<p><strong>Name:</strong> " . htmlentities($name) . "<br>";
			echo "<strong>Email:</strong> " . htmlentities($email) . "</br></p>";
		} else {
			echo "<p>Profile information not found.</p>";
		}
	}
?>
	<div class="form-card">
		<h1>Welcome <?php echo htmlentities($_SESSION["username"]); ?>!</h1>
		<?php get_profile($_SESSION["username"]); ?>
		<p class="form-footer-link"><a href="editprofileform.php">Edit Profile</a> | <a href="changepasswordform.php">Change Password</a> | <a href="logout.php">Logout</a></p>
	</div>
</body>
</html>