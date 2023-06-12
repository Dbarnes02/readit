<?php
require("includes/connect.php");
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
		if ($email && $password) {
			$login_sql = "SELECT user_id, user_name, access_level, password FROM users WHERE user_name = '$email' OR email = '$email' ";
			$login_result = $conn->query($login_sql);
			if ($login_result->num_rows > 0) {
				$row = $login_result->fetch_assoc();
				if (password_verify($password, $row['password'])) {
					session_start();
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['access_level'] = $row['access_level'];
					$_SESSION['diana-readit-1-2-3'] = session_id();
					$_SESSION['time'] = time();
					$message = "<p>You have logged in successfully.</p>";
					$email = $password = "";
				} else {
					$message = "<p>There was a problem. $conn->error</p>";
				}
			} else { $message = "<p>Invalid username or password</p>"; }
		} else { $message = "<p>Both fields are required.</p>"; }

	echo $message;
?>