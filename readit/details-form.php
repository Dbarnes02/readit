<?php
    $page_title = "Blog Detail | Readit";

    session_start();
    if (isset($_SESSION['diana-readit-1-2-3']));
    
    include('session-time-check.php');

    include('includes/connect.php');
    include('includes/header.php');
    $blog_id = $_GET['blog_id'];

    $blog_sql = "SELECT * FROM blog_post INNER JOIN users ON blog_post.posted_by = users.user_id WHERE blog_id = $blog_id";

    if ($result = $conn->query($blog_sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $content = htmlspecialchars_decode($row['content']);
            $posted_by = $row['first_name'];
            $date_posted = $row['date_posted'];
            $blog_id = $row['blog_id'];
        }
    }

    $comment_sql = "SELECT * FROM comments INNER JOIN users ON comments.commented_on_by_user_id = users.user_id WHERE blog_id = $blog_id";

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        $user = "SELECT * FROM users WHERE user_id = $user_id";
        $list_user = $conn->query($user);
        if ($list_user->num_rows > 0) {
            while ($list_row = $list_user->fetch_assoc()) {
                $profile_pic = $list_row['profile_pic'];
            }
        }   
    }
?>
    <div class="container py-5">
        <h2>Full Blog</h2>
        <div class="mt-4"><a href="<?php echo BASE_URL; ?>index.php">Back to Blogs</a></div>
        <div class="d-flex-column border border-2 rounded border-success p-3 my-4 w-50">
            <div>
                <p class="fw-bold"><?php echo $content; ?></p>
                <p>Posted By: <?php echo $posted_by; ?></p>
                <p>Posted on: <?php echo $date_posted; ?></p>
            </div>
                <?php if ($result = $conn->query($comment_sql)) {
                    if($result->num_rows > 0) {
                    echo'<div class="border-top border-secondary border-1 align-items-end">';
                    echo '<p class="pt-2 fw-bolder">Comments:<p>';
                        
                        while ($row = mysqli_fetch_assoc($result)) { 
                        echo '<div class="shadow p-2 mb-5 bg-body rounded">';
                            $comments = htmlspecialchars_decode($row['comment']);
                            $date = $row['date'];
                            $commented_by = $row['first_name'];
                            echo '<p>' .$comments. '</p>';
                            echo '<p>Comment By: ' .$commented_by .'</p>';
                            echo '<p>' . $date . '</p>';
                        echo '</div>';
                    echo '</div>';
                        }
                    } else {
                    $message = "<p>There are no comments to display</p>";
                    }
                }
            ?>
        

            <div class="message bg-secondary text-light w-50">
                <?php if (isset($message)): ?>
                    <?php echo $message; ?>
                <?php endif ?>
            </div>
        </div>
        <div class="w_message bg-danger text-light w-50">
			<?php if (isset($w_message)): ?>
				<?php echo $w_message; ?>
			<?php endif ?>
		</div>
    
        <?php if (isset($_SESSION['diana-readit-1-2-3']) && isset($profile_pic) == false) {
			echo '<p class="bg-danger w-50 mb-5">Please set your profile pic before commenting on a post</p>';
		}
		?>
        <?php if(isset($profile_pic) == true) : ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form" id="create-comment-form">
                <label class="h2" for="comment">Reply</label>
                <textarea name="comment" id="comment"></textarea>
                <input type="hidden" name="blog_id" value="<?php echo $blog_id?>">
                <button class="w-25 my-2 btn btn-lg btn-success" type="submit" name="submit">Comment on Post</button>
                <div id="comment_form"></div>
            </form>
        <?php endif?>
    </div>
<?php include('includes/footer.php'); ?>