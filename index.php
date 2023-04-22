<?php
session_start();
include 'conn.php';

include'header.php';
?>

<!--=== LANDING ===-->

		<section class="landing" style="background: url(images/pexels3.jpg) no-repeat center center/cover;">
			<div class="dark-overlay">
				<div class="inner-landing">
					<div class="x-large">
						<p class="w3-serif">GSM<span class="w3-text-teal" style="font-weight: bolder;">connect</span></p>
						<p class="lead">
                      	Create a profile, upload your assets, sell the good & the bad 
                    	</p>
					</div>

					<?php
					if (isset($_SESSION['username'])) {
					?>
					<div class="buttons">
						<a href="assets/assets.php" class="btn btn-light">Browse Assets</a>
					</div>
					<?php
					}else{
					?>
					<div class="buttons">
						<a href="register.php" class="btn-primary">Join</a>

						<a href="login.php" class="btn btn-light">Login</a>
					</div>
					<?php
					}
					?>
				</div>
			</div>
		</section>
	</body>
</html>
