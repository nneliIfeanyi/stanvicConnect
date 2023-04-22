
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keyword" content="" />
			<meta name="description" content="" />
			<meta name="author" content="Young Sam" />
			<meta http-equiv="X-UA-Compatible" content="ie=edge" />
			<link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
			<link rel="stylesheet" type="text/css" href="stylesheets/w3.css" />
			<title>stanvicConnect</title>
			<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3978549732541247"
     crossorigin="anonymous"></script>
	</head>
	<body class="w3-serif">
		<!--=== NAVBAR ===-->

		<nav class="navbar bg-dark">
			<h1>
				<a href="index.php" style="color: white !important;">
					<span class="w3-small w3-text-teal"><b>Stanvic</b></span>
				</a>
			</h1>

			<ul class="w3-serif w3-small">
				<?php
					if (isset($_SESSION['username'])) {
					?>
					<li><a href="assets/assets.php"><b>Assets</a></b></li>
					<li><a href="dashboard.php"><b>Dashboard</a></b></li>
					<li><a href="blog/blog.php"><b>Blog</a></b></li>
					<?php
					}else{
					?>
					<li><a href="register.php"><b>Register</a></b></li>

					<li><a href="login.php"><b>Login</a></b></li>
				
					<?php
					}
					?>
				
				
			</ul>
		</nav>
