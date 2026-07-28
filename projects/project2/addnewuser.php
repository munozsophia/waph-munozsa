<?php
	/* --- Server-side sanitation --- */
	function sanitize_input($input) {
		$input = trim($input);
		$input = stripslashes($input);
		$input = htmlspecialchars($input);
		return $input;

	}

	$name = isset($_POST["name"]) ? sanitize_input($_POST["name"]) : "";
	$email = isset($_POST["email"]) ? sanitize_input($_POST["email"]) : "";
	$username = isset($_POST["username"]) ? sanitize_input($_POST["username"]) : "";
	$password = isset($_POST["password"]) ? sanitize_input($_POST["password"]) : "";
	$repassword = isset($_POST["repassword"]) ? sanitize_input($_POST["repassword"]) : "";

	/* --- Required field check --- */
	if (empty($name) or empty($email) or empty($username) or empty($password) or empty($repassword)) {
		echo "<script>alert('All fields are required.');window.location='registrationform.php';</script>";
		die();
	}

	/* --- Validate same server-side rules from registrationform.php --- */
	if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
		echo "<script>alert('Invalid name.');window.location='registrationform.php';</script>";
		die();
	}

	if (!preg_match("/^\w+$/", $username)) {
		echo "<script>alert('Invalid username.');window.location='registrationform.php';</script>";
		die();
	}

	if (!preg_match("/^[\w.-]+@[\w-]+(\.[\w-]+)*$/", $email)) {
		echo "<script>alert('Invalid email address.');window.location='registrationform.php';</script>";
		die();
	}

	if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%^&])[\w!@#\$%^&]{8,}$/", $password)) {
		echo "<script>alert('Password must have at least 8 characters with 1 special symbol !@#\$%^&, 1 number, 1 lowercase, and 1 UPPERCASE.');window.location='registrationform.php';</script>";
		die();
	}

	if ($password !== $repassword) {
		echo "<script>alert('Passwords do not match.');window.location='registrationform.php';</script>";
		die();
	}

	if (addnewuser($username, $password, $name, $email)) {
		echo "<script>alert('Registration Succeeded! You can now login.');window.location='form.php';</script>";
	} else {
		echo "<script>alert('Registration Failed! The username or email may already be taken.');window.location='registrationform.php';</script>";
	}

  	function addnewuser($username, $password, $name, $email) {
		$mysqli = new mysqli('localhost','munozsa' /*Database username*/,'Sophia13_m' /*Database password*/,'waph' /*Database name*/);
		if ($mysqli->connect_errno) {
			printf("Database connection failed: %s\n", $mysqli->connect_error);
			return FALSE;
		}

		/* --- Check for duplicate user or email --- */
		$check_sql = "SELECT username FROM users WHERE username=? OR email=?";
		$check_stmt = $mysqli->prepare($check_sql);
		$check_stmt->bind_param("ss", $username, $email);
		$check_stmt->execute();
		$check_stmt->store_result();
		if ($check_stmt->num_rows > 0) return FALSE;

		$prepared_sql = "INSERT INTO users (username,password,name,email) VALUES (?, md5(?), ?, ?)";
		//echo "DEBUG>prepared_sql= $prepared_sql"; return TRUE;
		$stmt = $mysqli->prepare($prepared_sql);
		$stmt->bind_param("ssss", $username, $password, $name, $email);
		if ($stmt->execute()) return TRUE;
		return FALSE;
  	}
?>