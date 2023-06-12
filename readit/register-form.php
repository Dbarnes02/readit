<?php
$page_title = "Register | Readit";
require("includes/connect.php");
require("includes/header.php");

?>
<div class="text-center w-25 mx-auto my-5">
	<div class="form-signin">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form" id="register-form">
		<h2 class="h3 mb-4 fw-normal">Please Register</h2>
			<div class="message bg-danger text-light">
				<?php if (isset($message)): ?>
					<?php echo $message; ?>
				<?php endif ?>
			</div>
			<div class="form-floating">
				<input class="form-control" type="text" id="first_name" name="first_name" placeholder="first Name" value="<?php if (isset($first_name)) echo $first_name; ?>">
				<label for="first_name">First Name</label>
			</div>
			<div class="form-floating">
				<input class="form-control" type="text" id="last_name" name="last_name" placeholder="last Name" value="<?php if (isset($last_name)) echo $last_name; ?>">
				<label for="last_name">Last Name</label>
			</div>
			<div class="form-floating">
				<input class="form-control" type="text" id="user_name" name="user_name" placeholder="User Name" value="<?php if (isset($user_name)) echo $user_name; ?>">
				<label for="user_name">User Name</label>
			</div>
			<div class="form-floating">
				<input class="form-control" type="text" id="email" name="email" placeholder="Email" value="<?php if (isset($email)) echo $email; ?>">
				<label for="email">Email</label>
			</div>
			<div class="form-floating mb-3">
				<input class="form-control" type="text" id="password" name="password" placeholder="Password" value="<?php if (isset($password)); ?>">
				<label for="password">Password</label>
			</div>
			<button class="w-100 btn btn-lg btn-success" type="submit" name="submit">Register</button>
			<div class="mt-3">
				<p>Already have an Account? <a href="login-form.php">Login Here</a></p>
			</div>
		</form>
	</div>
</div>

<?php require("includes/footer.php");?>