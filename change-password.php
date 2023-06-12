<?php
session_start();
if(!isset($_SESSION['diana-readit-1-2-3'])) {
	header("location: index.php");
}

include('includes/connect.php');

    $p_message = "";
	$password = trim($_POST['password']);
	$new_password = trim($_POST['new_password']);	
	$user_id = $_SESSION['user_id'];
	$form_good = TRUE;

	$password = filter_var($password, FILTER_SANITIZE_STRING);
	$new_password = filter_var($new_password, FILTER_SANITIZE_STRING);

	if ($password == "") {
		$p_message .= "<p>Please provide current password.</p>";
		$form_good = FALSE;
	}

	if ($password) {
		$login_sql = "SELECT password FROM users WHERE user_id = $user_id AND deleted_yn = 'N' ";
		$login_result = mysqli_query($conn, $login_sql);

		if (mysqli_num_rows($login_result) > 0) {
			$login_row = mysqli_fetch_assoc($login_result);

			$pswd = $login_row['password'];

			if (password_verify($password, $pswd)) {
			}
			else
			{
				$p_message .= "<p>Current Password did not match</p>";
				$form_good = FALSE;
			}
		}
	}

	
	if ($new_password == "") {
		$p_message .= "<p>Please provide a new password.</p>";
		$form_good = FALSE;
	}
	// else
	// {
	// 	if (strlen($new_password) < 6  || !preg_match('@[0-9]@', $new_password) || !preg_match('@[A-Z]@', $new_password) || !preg_match('@[a-z]@', $new_password)) {
	// 		$p_message .= "<p>Password must contain: 6 letters at least 1 uppercase 1 lowercase & 1 number</p>";
	// 		$form_good = FALSE;
	// 	}
	// }

	if ($form_good == TRUE) {
		$hash = password_hash($new_password, PASSWORD_DEFAULT);
		$update_sql = "UPDATE users SET password = '$hash' WHERE user_id = " . $_SESSION['user_id'];
	
		if ($conn->query($update_sql)) {
			$p_message .= "<p>Password Changed</p>";
		}
		else
		{
			$p_message .= "<p>There was a problem changing your password $conn->error</p>";
		}
	}
echo ($p_message);
?>
