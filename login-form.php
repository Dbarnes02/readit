<?php
$page_title = "Login | Readit";
require("includes/connect.php");
require("includes/header.php");
session_start();

?>
<div class="text-center w-25 mx-auto my-5">
	<div class="form-signin">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form" id="login-form">
			<h2 class="h3 mb-4 fw-normal">Please Sign in</h2>
			<div>
			<div class="message bg-danger text-light">
				<?php if (isset($message)): ?>
					<?php echo $message; ?>
				<?php endif ?>
			</div>
			<div class="form-floating">
				<input class="form-control" type="text" id="email" name="email" placeholder="Email or User Name" value="<?php if (isset($email)) echo $email; ?>">
				<label for="email">Email or User Name</label>
			</div>
			<div class="form-floating mb-3">
				<input class="form-control" type="text" id="password" name="password" placeholder="Password" value="<?php if (isset($password)) echo $password; ?>">
				<label for="password">Password</label>
			</div>
			<button class="w-100 btn btn-lg btn-success" type="submit" name="login-btn" value="Login">Login</button>
			<div class="mt-3">
				<p>Don't have an Account? <a href="register-form.php">Register Here</a></p>
			</div>
		</form>
	</div>
</div>

<?php require("includes/footer.php"); ?>