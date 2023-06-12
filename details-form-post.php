<?php
session_start();
if(!isset($_SESSION['diana-readit-1-2-3'])) {
    header("location: index.php");
}

include('includes/connect.php');

$w_message = "";

extract($_POST);

if (isset($_POST['blog_id'])) {
    $blog_id = $_POST['blog_id'];
}

$user_id = $_SESSION['user_id'];

$pass_go = true;

    if($comment == "") {
        $pass_go = FALSE;
        $w_message .= "<p>Please enter some content</p>";
    } else {
        $htmlspecialchar = htmlspecialchars($comment, ENT_QUOTES);
        $sql = "INSERT INTO comments (comment, blog_id, commented_on_by_user_id) VALUES ('$htmlspecialchar', $blog_id, $user_id)";
        if ($conn->query($sql)) {
            $w_message .= "<p>comment successfully created</p>";
        } else {
            $w_message .= "<p>There was a problem creating comment. $conn->error</p>";
        }
    }
    echo ($w_message);
?>