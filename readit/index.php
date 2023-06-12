<?php
session_start();
$page_title = "Home | Readit";

require("includes/connect.php");
include ("includes/messages.php");
require("includes/header.php");
$message = "";
?>

	<div class="container">
	<div class="message bg-danger text-light">
		<?php if (isset($message)): ?>
			<?php echo $message; ?>
		<?php endif ?>
	</div>
	<h2>All Blog Posts</h2>
		<?php
			$all_blogs = "SELECT * FROM blog_post INNER JOIN users ON blog_post.posted_by = users.user_id ORDER BY date_posted DESC";
			$list_result = $conn->query($all_blogs);
			if($list_result->num_rows > 0):
				while ($list_row = $list_result->fetch_assoc()): ?> 
				<?php
					$content = htmlspecialchars_decode($list_row['content']);
					$posted_by = $list_row['first_name'];
					$date_posted = $list_row['date_posted'];
					$blog_id = $list_row['blog_id'];
						
					$all_comments = "SELECT count(comment_id), comment, date, commented_on_by_user_id, users.first_name FROM comments INNER JOIN users ON comments.commented_on_by_user_id = users.user_id WHERE blog_id = $blog_id";
					$list_comments = $conn->query($all_comments);
					if ($list_comments->num_rows > 0):
						while ($list_comment_row = $list_comments->fetch_assoc()):
						$comments = $list_comment_row['count(comment_id)'];
						$comment = htmlspecialchars_decode($list_comment_row['comment']);
						$date = $list_comment_row['date'];
						$commented_by = $list_comment_row['first_name']
				?>
				<div class="d-flex flex-column border border-2 rounded border-success p-2 my-4 w-50">
					<p class="fw-bold"><?php echo $content; ?></p>
					<p>Posted By: <?php echo $posted_by; ?></p>
					<p>Posted On: <?php echo $date_posted; ?></p>
				<div class="d-flex justify-content-between">
					<a href="<?php echo BASE_URL; ?>details-form.php?blog_id=<?php echo $blog_id; ?>">Read More</a>
					<p class="show-comments align-self-end text-decoration-none"><i class="bi bi-chat-right-text"></i> <?php echo $comments; ?></p>
				</div>
				</div>
						<?php endwhile ?>
					<?php endif ?>	
				<?php endwhile ?>
			<?php endif ?>	
	</div>
	<?php require("includes/footer.php"); ?>