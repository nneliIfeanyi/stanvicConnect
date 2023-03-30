<?php
session_start();
include 'conn.php';

$usenameErr = $passErr =$msg2 = $msg = '';

if ($_SERVER['REQUEST_METHOD'] == "POST" ) {

	$username = mysqli_real_escape_string($data, htmlspecialchars($_POST['username'], ENT_QUOTES, 'utf-8'));
	$password = mysqli_real_escape_string($data, htmlspecialchars($_POST['password'], ENT_QUOTES, 'utf-8'));
	if (empty($username)) {

		$usernameErr = "Please kindly enter a username..";

	}elseif (empty($password)) {
		
		$passErr = "Input password..";

	}else{

		if (login_pass($data, $username, $password)) {
			
			$_SESSION['username'] = $username;
			$msg2 = "Login Successful";
			?>
			<meta http-equiv="refresh" content="2; dashboard.php">
			<?php
		}else{

			$msg = "Invalid Credentials.";
		}

	}

}



?>


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
			<title>stanvicConnect | Login</title>
	</head>
	<body>

		<!--=== NAVBAR ===-->

		
			<?php

				include 'header.php';
			?>


		<!--=== CONTAINER ===-->

		<section class="container">

			<!--=== ALERTS ===-->

			<h1 class="large text-primary">
				Sign In
			</h1>

			<p class="user">
				<img src="images/avatar_guy.png"> Sign In into Your Account
			</p>

			<?php

		  	if (!empty($msg)) {

		  		?>
		  		<p class="user w3-text-red"><?= $msg ?></p>
		  		<?php
		  	}
		 
			?>

			<?php

		  	if (!empty($msg2)) {

		  		?>
		  		<p class="user w3-text-green"><?= $msg2 ?></p>
		  		<?php
		  	}
		 
			?>


			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="form">

				<div class="form-group">
					<input type="text" name="username" placeholder="Email Address" />

					<?php

					  	if (!empty($usernameErr)) {

					  		?>
					  		<span class="w3-small w3-tag w3-red"><?= $usernameErr ?></span>
					  		<?php
					  	}
					 
					?>
				</div>

				<div class="form-group">
					<input type="password" name="password" placeholder="Password" />

					<?php

					  	if (!empty($passErr)) {

					  		?>
					  		<span class="w3-small w3-tag w3-red"><?= $passErr ?></span>
					  		<?php
					  	}
					 
					?>
				</div>

				<input type="submit" name="login" value="Login" class="btn-primary" />
			</form>

			<p class="my-1">
				<a href="https://wa.me/9168655298?text=I%20Forgot%20my%20password..%20pls.">Forgot Password?
				</a>
			</p>

			<p class="my-1">
				Don't have an account? <a href="register.php">Sign Up</a>
			</p>

			<?php

				include 'footer.php';

			?>
		</section>
	</body>
</html>