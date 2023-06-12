<?php
$page_title = "My Account | Readit";

session_start();
if(!isset($_SESSION['diana-readit-1-2-3'])) {
	header("location: login-form.php");
}

if (isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
}

if (isset($_GET['m'])) {
	$m = $_GET['m'];

	switch ($m) {
		case 'error':
			$message = "<p>Sorry, unable to delete that blog</p>";
			break;

		case 'success':
			$message = "<p>Blog deleted successfully</p>";
			break;
		default:
			// code...
			break;
	}
}

include("session-time-check.php");
include("includes/messages.php");
include("includes/connect.php");

$user = "SELECT * FROM users WHERE user_id = $user_id";
$list_user = $conn->query($user);
if ($list_user->num_rows > 0) {
	while ($list_row = $list_user->fetch_assoc()) {
		$profile_pic = $list_row['profile_pic'];
	}
}

include("includes/header.php");
?>

<div class="container my-5">
	<div class="user-home d-flex justify-content-between gap-5">
		<?php 
		$list_sql= "SELECT * FROM blog_post WHERE posted_by = $user_id AND deleted_yn = 'N' ORDER BY date_posted DESC";
		$list_result = $conn->query($list_sql);
			if ($list_result->num_rows > 0): ?>
		<div class="my-blogs w-50">
		<h2 class="mb-4">My blogs</h2>
			<?php while ($list_row = $list_result->fetch_assoc()): ?>
			<div class="blog border border-2 border-success rounded mb-3 p-2">
				<?php 
				$post_content = htmlspecialchars_decode($list_row['content']);
				$post_by = $list_row['posted_by'];
				$tags = $list_row['tags'];
				$post_date = $list_row['date_posted'];
				$blog_id = $list_row['blog_id'];
					
					$all_comments = "SELECT * FROM comments INNER JOIN users ON comments.commented_on_by_user_id = users.user_id WHERE blog_id = $blog_id";
					$list_comments = $conn->query($all_comments);
					if ($list_comments->num_rows > 0) {
						while ($list_comment_row = $list_comments->fetch_assoc()) {
						$comment = htmlspecialchars_decode($list_comment_row['comment']);
						$date = $list_comment_row['date'];
						$commented_by = $list_comment_row['first_name'];
						$comment_id = $list_comment_row['comment_id'];
						}
					}
				?>
				<div>
					<p>Posted on <?php echo $post_date; ?></p>
					<p class="fw-bold"><?php echo $post_content; ?></p>	
				</div>
				<div class="border-top border-secondary border-1">
				<p class="pt-2 fw-bolder">Comments:<p>
					<p><?php echo isset($comment) ? $comment : "No Comments"; ?></p>
					<p><?php echo isset($commented_by) ? $commented_by : ""; ?></p>
					<p><?php echo isset($date) ? $date : ""; ?></p>
				</div>
				<div class="links">
					<a class="pe-2" id="edit-post" href="user-home?blog_id=<?php echo $blog_id; ?>">Edit blog post</a>
					<a onClick="javascript: return confirm('Do you want to delete this post?');" href="delete.php?blog_id=<?php echo $blog_id; ?>">Delete blog post</a>
				</div>
			</div> <!-- end of blog -->
			<?php endwhile ?>	
			</div><!-- end of my-blogs-->
		<div>
			<div class="update-blog">
				<div class="u_message bg-danger text-light">
					<?php if (isset($u_message)): ?>
						<?php echo $u_message; ?>
					<?php endif ?>
				</div>
				<?php
					if(isset ($_GET['blog_id']) && is_numeric($_GET['blog_id']) ) {
					$blog_id = $_GET['blog_id'];
					$get_blog = "SELECT * FROM blog_post WHERE blog_id = $blog_id";
					$blog_result = $conn->query($get_blog);
						if($list_blog = $blog_result->fetch_assoc()) {
							$content = htmlspecialchars_decode($list_blog['content']);
							$post_by = $list_blog['posted_by'];
							$tags = $list_blog['tags'];
							$post_date = $list_blog['date_posted'];
							$blog = $list_blog['blog_id'];
						}?>
						<?php if($profile_pic == false) {
							echo '<p>Please set your profile pic before making your first post</p>';
						}
						?>
						<?php if($profile_pic == true) : ?>
							<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form mb-5" id="update-post">
								<label class="h2 pb-3" for="post">Update Post</label>
								<textarea name="blog_post" id="blog_post"><?php echo $content; ?></textarea>
								<input class="form-control mt-2" type="text" name="tags" id="tags" name="tags" placeholder="Add More Tags" value="<?php echo $tags; ?>">
								<input type="hidden" name="blog_id" value="<?php echo $blog_id?>">
								<button class="w-25 my-2 btn btn-lg btn-success float-end" type="submit" name="submit">Update</button>
							</form>
						<?php endif ?>
					<?php
					}
				?>
			</div> <!-- end of update blog -->
			
			<?php else: ?>
				<p>No post to display. Please create one.</p>
			<?php endif ?>

			<div class="new-post">
				<div class="message bg-danger text-light">
					<?php if (isset($message)): ?>
						<?php echo $message; ?>
					<?php endif ?>
				</div>
				<?php if($profile_pic == false) {
					echo '<p>Please set your profile pic before making your first post</p>';
				}
				?>
				<?php if($profile_pic == true) : ?>
					<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST" class="form" id="create-post-form">
						<label class="h2 pb-3" for="post">Create Post</label>
						<textarea name="post" id="post"></textarea>
						<input class="form-control mt-2" type="text" name="tags" id="tags" name="tags" placeholder="Add a Tag">
						<button class="w-25 my-2 btn btn-lg btn-success float-end" type="submit" name="submit">Post</button>
					</form>
				<?php endif ?>
			</div> <!-- end new post -->
		<div> <!-- end of posts -->
	</div> <!-- end of user-home -->
</div> <!-- end of container -->

<?php include("includes/footer.php"); ?>