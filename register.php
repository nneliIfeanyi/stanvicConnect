<?php
session_start();
include 'conn.php';

$usenameErr = $phoneErr = $passErr = $confirmErr = $spotErr = $msg = $msg2 ="";

if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
	
	$username = mysqli_real_escape_string($data, htmlspecialchars($_POST['username'], ENT_QUOTES, 'utf-8'));
	$phone = mysqli_real_escape_string($data, htmlspecialchars($_POST['phone'], ENT_QUOTES, 'utf-8'));
	$password = mysqli_real_escape_string($data, htmlspecialchars($_POST['password'], ENT_QUOTES, 'utf-8'));
	$c_password =mysqli_real_escape_string($data, htmlspecialchars($_POST['comfirm_password'], ENT_QUOTES, 'utf-8'));
	$spot =mysqli_real_escape_string($data, htmlspecialchars($_POST['spot'], ENT_QUOTES, 'utf-8'));
	$avatar = "img/avatar_guy.png";
	
	if (empty($username)) {

		$usernameErr = "Please kindly enter a username..";
		
	}elseif (empty($phone)) {

		$phoneErr = "Also input your phone..";
		
	}elseif (empty($spot)) {

		$spotErr = "Input your address..";
		
	}elseif (empty($password)) {
		
		$passErr = "Input password..";

	}elseif (strlen($password) < 6) {
			
		$passErr = "Too short, password must be above 6 characters";

	}elseif (empty($c_password)) {
		
		$confirmErr = "kindly comfirm password..";

	}elseif ($password !== $c_password) {
			
		$confirmErr = "Password does not match ..";

	}elseif (check_username($data,$username)) {

		$msg = "A user already exist with same username."; 
		
	}elseif (check_email($data, $phone)) {

		$msg = "A user already exist with this number."; 
	}else{

   		if (dbdrop($data,$username,$spot,$phone,$password,$avatar)) {
   			
   			$msg2 = "Registration successful you can now Login.";

            ?>
           	 <meta http-equiv='refresh' content='3; login.php'>
            <?php
   		}else{

   			$msg = "An error occured, Please try again later.";

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
			<title>Join stanvicConnect</title>
	</head>
	<body>

		<?php

			include'header.php';

		?>


		<!--=== CONTAINER ===-->

		<section class="container">
			<h1 class="large text-primary">
				Sign Up
			</h1>

			<p class="user">
				<img src="images/avatar_guy.png"> Create Your Account
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
					<input type="text" name="username" placeholder="username" />

					<?php

					  	if (!empty($usernameErr)) {

					  		?>
					  		<span class="w3-small w3-tag w3-red"><?= $usernameErr ?></span>
					  		<?php
					  	}
					 
					?>
				</div>

				<div class="form-group">
					<input type="number" name="phone" placeholder="Phone Number.." class="w3-input" />
					<!--<small class="form-text">
						This site uses Gravatar, so if you want a profile image, use Gravatar email
					</small>-->

					<?php

					  	if (!empty($phoneErr)) {

					  		?>
					  		<span class="w3-small w3-tag w3-red"><?= $phoneErr ?></span>
					  		<?php
					  	}
					 
					?>
				</div>

				<div class="form-group">
					<select name="spot">
					<option value="">Your Block</option>
					<option value="Block A Murada Plaza Suleja">Block A</option>
					<option value="Block B Murada Plaza Suleja">Block B</option>
					<option value="Block C Murada Plaza Suleja">Block C</option>
					<option value="Opposite Block A Murada Plaza Suleja">Opposite Block A</option>
					<option value="Opposite Block B Murada Plaza Suleja">Opposite Block B</option>
					<option value="Opposite Block C Murada Plaza Suleja">Opposite Block C</option>
					<option value="Elsewhere Suleja">Elsewhere</option>
					</select>
					<?php

					if (!empty($spotErr)) {

					?>
					<span class="w3-small w3-text-red"><?= $spotErr ?></span>
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

				<div class="form-group">
					<input type="password" name="comfirm_password" placeholder="Comfirm password" />

					<?php

					  	if (!empty($confirmErr)) {

					  		?>
					  		<span class="w3-small w3-tag w3-red"><?= $confirmErr ?></span>
					  		<?php
					  	}
					 
					?>
				</div>
				<input type="submit" name="signup" value="Register" class="btn-primary" />
			</form>

			<p class="my-1">
				Already had an account? <a href="login.php">Sign In</a>
			</p>

			<?php

			include'footer.php';

		?>
		</section>
	</body>
</html>