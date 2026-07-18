<?php
	require "session_auth.php";

	$token = $_POST["nocsrftoken"];
	if (!isset($token) or ($token != $_SESSION["nocsrftoken"])) {
		echo "<script>alert('CSRF Attack is detected');window.location='index.php';</script>";
		die();
	}

	$username = $_SESSION["username"]; //$_REQUEST["username"];
	$newpassword = isset($_POST["newpassword"]) ? $_POST["newpassword"] : "";
	$renewpassword = isset($_POST["renewpassword"]) ? $_POST["renewpassword"] : "";

	if (empty($newpassword) or empty($renewpassword)) {
		echo "<script>alert('No new password provided.');window.location='changepasswordform.php';</script>";
		die();
	}

	if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%^&])[\w!@#\$%^&]{8,}$/", $newpassword)) {
		echo "<script>alert('Password must have at least 8 characters with 1 special symbol !@#\$%^&, 1 number, 1 lowercase, and 1 UPPERCASE.');window.location='changepasswordform.php';</script>";
		die();
	}
	if ($newpassword !== $renewpassword) {
		echo "<script>alert('Passwords do not match.');window.location='changepasswordform.php';</script>";
		die();
	}

	if (changepassword($username, $newpassword)) {
		echo "<script>alert('Password has been changed!');window.location='index.php';</script>";
	} else {
		echo "<script>alert('Password change has failed!');window.location='changepasswordform.php';</script>";
	}

	function changepassword($username, $password) {
		$mysqli = new mysqli('localhost','munozsa' /*Database username*/, 'Sophia13_m' /*Database password*/,'waph' /*Database name*/);
		if ($mysqli->connect_errno) {
			printf("Database connection failed: %s\n", $mysqli->connect_error);
			return FALSE;
		}
		$prepared_sql = "UPDATE users SET password = md5(?) WHERE username = ?;";
		$stmt = $mysqli->prepare($prepared_sql);
		$stmt->bind_param("ss", $password, $username);
		if ($stmt->execute()) return TRUE;
		return FALSE;
	}
?>
<p class="form-footer-link"><a href="index.php">Home</a> | <a href="logout.php">Logout</a></p>