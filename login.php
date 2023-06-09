<?php
session_start();
include 'conn.php';

$usenameErr = $passErr =$msg2 = $msg = '';

if ($_SERVER['REQUEST_METHOD'] == "POST" ) {

	$username1 = mysqli_real_escape_string($data, htmlspecialchars($_POST['username'], ENT_QUOTES, 'utf-8'));
	$username2 = trim($username1);
	$username = strtolower($username2);
	$password = mysqli_real_escape_string($data, htmlspecialchars($_POST['password'], ENT_QUOTES, 'utf-8'));

	if (empty($username)) {

		$usernameErr = "Please kindly enter a username..";

	}elseif (empty($password)) {
		
		$passErr = "Input password..";

	}else{

		if (login_pass($data, $username, $password)) {
			
			$_SESSION['username'] = $username;
			$msg2 = "Login Successful";
			$cookie_name = $username;
			$value = $username;
			setcookie($cookie_name,$value,time()+ (86400 * 30), "/");
			?>
			<meta http-equiv="refresh" content="2; dashboard.php">
			<?php
		}else{

			$msg = "Invalid Credentials.";
		}

	}

}

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
		  		<p class="user w3-text-green"><b><?= $msg2 ?></b></p>
		  		<?php
		  	}
		 
			?>


			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="form">

				<div class="form-group">
					<input type="text" name="username" placeholder="Username" />

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