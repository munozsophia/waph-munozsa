<?php
	require "session_auth.php";

	$token = $_POST["nocsrftoken"];
	if (!isset($token) or ($token != $_SESSION["nocsrftoken"])) {
		echo "<script>alert('CSRF Attack is detected');window.location='index.php';</script>";
		die();
	}

	function sanitize_input($input) {
		$input = trim($input);
		$input = stripslashes($input);
		$input = htmlspecialchars($input);
		return $input;
	}

	$username = $_SESSION["username"];
	$name  = isset($_POST["name"])  ? sanitize_input($_POST["name"])  : "";
	$email = isset($_POST["email"]) ? sanitize_input($_POST["email"]) : "";

	if (empty($name) or empty($email)) {
		echo "<script>alert('Name and email are required.');window.location='editprofileform.php';</script>";
		die();
	}

	if (!preg_match("/^[\w.-]+@[\w-]+(\.[\w-]+)*$/", $email)) {
		echo "<script>alert('Invalid email address.');window.location='editprofileform.php';</script>";
		die();
	}

	if (editprofile($username, $name, $email)) {
		echo "<script>alert('Profile updated!');window.location='index.php';</script>";
	} else {
		echo "<script>alert('Profile update failed. That email may already be in use.');window.location='editprofileform.php';</script>";
	}

	function editprofile($username, $name, $email) {
		$mysqli = new mysqli('localhost','munozsa' /*Database username*/, 'Sophia13_m' /*Database password*/,'waph' /*Database name*/);
		if ($mysqli->connect_errno) {
			printf("Database connection failed: %s\n", $mysqli->connect_error);
			return FALSE;
		}

		$check_sql = "SELECT username FROM users WHERE email=? AND username<>?";
		$check_stmt = $mysqli->prepare($check_sql);
		$check_stmt->bind_param("ss", $email, $username);
		$check_stmt->execute();
		$check_stmt->store_result();
		if ($check_stmt->num_rows > 0) {
			return FALSE;
		}

		$prepared_sql = "UPDATE users SET name = ?, email = ? WHERE username = ?;";
		$stmt = $mysqli->prepare($prepared_sql);
		$stmt->bind_param("sss", $name, $email, $username);
		if ($stmt->execute()) return TRUE;
		return FALSE;
	}
?>