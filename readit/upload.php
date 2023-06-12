<?php
session_start();
include('includes/connect.php');
$user_id = $_SESSION["user_id"];

$message = "";

$imageData = '';
if (isset($_FILES['file']['name'][0])) {
    foreach ($_FILES['file']['name'] as $keys => $values) {
        $fileName = uniqid() . '_' . $_FILES['file']['name'][$keys];

        if (move_uploaded_file($_FILES['file']['tmp_name'][$keys], 'uploads/' . $fileName)) {
            $imageData .= '<img src="uploads/' . $fileName . '" class="thumbnail" />';

            $img_sql = "UPDATE users SET profile_pic = '$fileName' WHERE $user_id = user_id";
            mysqli_query($conn, $img_sql);
            $message = "Profile Pic Updated";
        }
    }
}
// echo $imageData;
echo $message;
