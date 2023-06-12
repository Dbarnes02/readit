<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $page_title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"></link>
</head>
<body>
	<header>
    <div class="px-3 py-2 text-bg-dark">
		<div class="container">
			<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
			<a href="<?php echo BASE_URL; ?>index.php" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-success text-decoration-none">
				<i class="bi bi-clipboard-heart me-2" style="font-size: 4rem;" role="img" aria-label="readit"></i>
			</a>

			<ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
				<li>
				<a href="<?php echo BASE_URL; ?>index.php" class="nav-link text-white">
					<i class="bi bi-house-heart d-block mb-1" style="font-size: 2rem; text-align: center;"></i>
					Home
				</a>
				</li>
				<li>
				<a href="<?php echo BASE_URL; ?>tags.php" class="nav-link text-white">
					<i class="bi bi-tags d-block mb-1" style="font-size: 2rem; text-align: center;"></i>
					Tags
				</a>
				</li>
				<li>
				<a href="#" class="nav-link text-white">
					<i class="bi bi-list-stars d-block mb-1" style="font-size: 2rem; text-align: center;"></i>
					Categories
				</a>
				</li>
				<li>
				<a href="#" class="nav-link text-white">
					<i class="bi bi-filter-square d-block mb-1" style="font-size: 2rem; text-align: center;"></i>
					Filter
				</a>
				</li>
			</ul>
			</div>
		</div>
		</div>
		<div class="px-3 py-2 border-bottom mb-3">
		<div class="container d-flex flex-wrap justify-content-center">
			<form class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search">
				<input type="search" class="form-control" placeholder="Search..." aria-label="Search">
			</form>

		<div class="d-flex justify-content-between align-items-center text-end">
			<?php if (isset($_SESSION['diana-readit-1-2-3'])): ?>
				<a href="<?php echo BASE_URL; ?>user-home.php" class="ps-4 nav-link text-dark">
					<i class="bi bi-speedometer2 d-block mb-0.5" style="font-size: 1.5rem; text-align: center;"></i>
					Dashboard
				</a>
				<a href="<?php echo BASE_URL; ?>account-form.php" class=" ps-4 nav-link text-dark">
					<i class="bi bi-person-circle d-block mb-0.5" style="font-size: 1.5rem; text-align: center;"></i>
				Account
				</a>
					<a class="btn btn-success text-white me-2 ms-4" href="<?php echo BASE_URL; ?>logout.php">Logout</a>
			<?php else: ?>
				<a class="btn btn-success text-white me-2" href="<?php echo BASE_URL; ?>login-form.php">Login</a>
			<?php endif ?>
			<?php if (isset($_SESSION['access_level']) && $_SESSION['access_level'] == 'admin'): ?>
				<a href="<?php echo BASE_URL; ?>admin-form.php" class="nav-link text-dark ms-2">
					<i class="bi bi-person-lock d-flex justify-content-center mb-1" style="font-size: 1.5rem; "></i>
					Admin
				</a>
			<?php endif ?>
			</div>
		</div>
    </div>
	</header>
	<main>