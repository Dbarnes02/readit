<?php

require "includes/connect.php";

session_start();
if(!isset($_SESSION['diana-readit-1-2-3'])) {
	header("location: login-form.php");
}


$blog_id = $_GET['blog_id'];

if (!$blog_id || !is_numeric($blog_id)) {
	header("location: user-home.php?m=error");
}
else
{
	$sql = "UPDATE blog_post SET deleted_yn = 'Y' WHERE blog_id = $blog_id";
	mysqli_query($conn, $sql);
	header("location: user-home.php?m=success");
}
echo $blog_id;
?>