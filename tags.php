<?php
$page_title = "Tags | Readit";
session_start();
if (isset($_SESSION['diana-readit-1-2-3']));

include('includes/connect.php');
include('includes/header.php');

$tags = "SELECT tags FROM blog_post";
$list_result = $conn->query($tags);
if ($list_result->num_rows > 0) {
    echo '<div class="container py-5">';
    echo '<h2 class="pb-4">All Tags</h2>';
    while ($list_row = $list_result->fetch_assoc()) {
        $tags = $list_row['tags'];
        echo '<p><a href="#">#'. $tags . '</a></p>';
    }
    echo '</div>';
}
?>

<?php include('includes/footer.php'); ?>