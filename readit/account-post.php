<?php
	session_start();
    if(!isset($_SESSION['diana-readit-1-2-3'])) {
        header("location: index.php");
    }

	include('includes/connect.php');

	$first_name = $last_name = $email = $user_name = "";
	extract($_POST);
    $user_id = $_SESSION['user_id'];
	$message = "";
	$form_good = TRUE;


	if ($first_name == "" || $last_name == "" || $email == "" || $user_name == "") {
		$message .= "<p>Please fill out all fields.</p>";
		$form_good = FALSE;
	}

	if ($form_good == TRUE) {
		$update_sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', user_name = '$user_name', email = '$email' WHERE user_id = $user_id";
		if ($conn->query($update_sql)) {
			$message .= "<p>Account Info Updated</p>";
			$first_name = $last_name = $user_name = $email = "";
		}
		else
		{
			$message .= "<p>There was a problem updating your account info$conn->error</p>";
		}
	}

echo ($message);
?>