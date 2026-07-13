<?php
	$username = $_POST["username"];
	$password = $_POST["password"];
	if (isset($username) and isset($password)) {
		//echo "DEBUG> got username=$username; password=$password";
		if (addnewuser($username,$password)) {
			echo "Registration Succeeded!";
		}else{
			echo "Registration Failed!";
		}
	} else {
		echo "No username/password provided!";
	}
  	function addnewuser($username, $password) {
		$mysqli = new mysqli('localhost','munozsa' /*Database username*/,'Sophia13_m' /*Database password*/,'waph' /*Database name*/);
		if ($mysqli->connect_errno) {
			printf("Database connection failed: %s\n", $mysqli->connect_error);
			return FALSE;
		}
		$prepared_sql = "INSERT INTO users (username, password) VALUES (?, md5(?))";
		//echo "DEBUG>prepared_sql= $prepared_sql"; return TRUE;
		$stmt = $mysqli->prepare($prepared_sql);
		$stmt->bind_param("ss", $username, $password);
		if ($stmt->execute()) return TRUE;
		return FALSE;
  	}
?>