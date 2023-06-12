<?php 
require("includes/connect.php");
	$first_name = mysqli_real_escape_string($conn,trim($_POST['first_name']));
	$last_name = mysqli_real_escape_string($conn,trim($_POST['last_name']));
	$user_name = mysqli_real_escape_string($conn,trim($_POST['user_name']));
	$email = mysqli_real_escape_string($conn,trim($_POST['email']));
	$password = mysqli_real_escape_string($conn,trim($_POST['password']));
	$message = "";
    //  or better prepared statements
	$pass_go = true;

	if ($user_name || $email) {
		$check_sql = "SELECT user_id FROM users WHERE email = '$email' OR user_name = '$user_name'";
		$check_res = $conn->query($check_sql);
		if ($check_res->num_rows > 0) 
		{
			$message .= "<p>Sorry that username or email is already taken. Please try another.</p>";
			$pass_go = false;
		}
	}
	//  other validation in here - email, strip html, min lengths, complexity for password
	//  do those on your own

	if (!$first_name || !$last_name || !$user_name || !$email || !$password)  {
		$pass_go = false;
		$message .= "<p>All fields are required</p>";
	}

	if ($pass_go == true) {
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO users (first_name, last_name, email, user_name, password) VALUES ('$first_name', '$last_name','$email','$user_name','$hash')";

		if ($conn->query($sql)) {
			$message .= "<p>You have successfully registered. </p>";
			$first_name = $last_name = $user_name = $email = $password = "";
		} else {
			$message .= "<p>There was a problem registering. $conn->error</p>";
		}
	}

	echo ($message);
?>
