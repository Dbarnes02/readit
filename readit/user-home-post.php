<?php
session_start();
if(!isset($_SESSION['diana-readit-1-2-3'])) {
    header("location: index.php");
}

include('includes/connect.php');

$message = "";

extract($_POST);

$user_id = $_SESSION['user_id'];
$pass_go = true;

    if($post == "" || $tags == "") {
        $pass_go = FALSE;
        $message .= "<p>Please enter some content and a tag</p>";
    } else {
        $htmlspecialchar = htmlspecialchars($post, ENT_QUOTES);
        $sql = "INSERT INTO blog_post (content, posted_by, tags) VALUES ('$htmlspecialchar', $user_id, '$tags')";
        if ($conn->query($sql)) {
            $message .= "<p>Post successfully created</p>";
        } else {
            $message .= "<p>There was a problem creating post. $conn->error</p>";
        }
    }
    echo ($message);

?>