<?php
include('includes/connect.php');
session_start();

if(!isset($_SESSION['diana-readit-1-2-3'])) {
    header("location: index.php");
}

$u_message = "";

if(isset($_POST['blog_id'])) {
    $blog_id = $_POST['blog_id'];
}

if (isset($_POST['blog_post'])) {
    $blog_post = $_POST['blog_post'];
}

if (isset($_POST['tags'])) {
    $tags = $_POST['tags'];
}

$pass_go = true;

    if($post ="") {
        $pass_go = FALSE;
        $u_message .= "<p>Please enter some content</p>";
    } else {
        $htmlspecialchar = htmlspecialchars($blog_post, ENT_QUOTES);
    $sql = "UPDATE blog_post SET content = '$blog_post', tags = '$tags' WHERE blog_id = $blog_id";
        if ($conn->query($sql)) {
            $u_message .= "<p>Post updated</p>";
        } else {
            $u_message .= "<p>There was a problem updating your post. $conn->error</p>";
        }
    }
echo ($u_message);
?>