<?php
session_start();
include 'conn.php';

if (check_login($data)) {

	$user_data = check_login($data);
	$id = $user_data['id'];
	$username = $user_data['username'];

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
		<title>Dashboard</title>
	</head>
	<body>

		<!--=== NAVBAR ===-->
		<?php

			include 'header.php';
		?>


		<!--=== CONTAINER ===-->

		<section class="container">
			<h1 class="large text-primary">
				Fellows
			</h1>

			<p class="user">
				<img src="images/avatar_guy.png">Connect with Fellow Engineers
			</p>

			<?php

			$sql = "SELECT * FROM fellows ORDER BY id DESC";
    		$query = mysqli_query($data, $sql);
    		if (mysqli_num_rows($query) > 0) {

			while ($result = mysqli_fetch_assoc($query)) {
			$f_id = $result['id'];
			$username=$result['username'];
			$spot=$result['address'];
			$date = $result['date'];
			$profile_pic = $result['img'];
	    	?>
			<div class="profiles">
				<div class="profile bg-light">
					<div style="margin:auto;width: 100%;">
					<img src="<?=$profile_pic?>" class="w3-circle" />
					</div>
					<div>
						<h2><?=$username?></h2>
						<p><?=$spot?></p>
						<p>Joined on <?=$date?></p>
						<a href="view_profile.php?id=<?=$f_id?>" class="btn btn-primary">View Assets</a>

					</div>

				</div>
				
			</div><!--Profiles ends-->

			<?php
				}	
			}
			include 'footer.php';


			?>
		</section>
	</body>
	</html>

	<?php
}
