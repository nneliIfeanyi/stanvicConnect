<?php
session_start();
include 'conn.php';

if (check_login($data)) {

	$user_data = check_login($data);
	$id = $user_data['id'];
	$username = $user_data['username'];
	$pic = $user_data['img'];

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
				Dashboard
			</h1>

			<p class="user">
				<a href="update_image.php?id=<?=$id?>"><img src="<?=$pic?>" width="80px" hieght="85px"></a> Welcome <?=$user_data['username']?>
			</p>

			<div class="dash-buttons">
				<a href="create_profile.php" class="btn-light">
					<i class="fas fa-user-circle text-primary"></i> Edit Profile
				</a>

				<a href="add_asset.php" class="btn-light">
					<i class="fab fa-black-tie text-primary"></i> Add Asset
				</a>

			</div>

			<h2 class="my-2">My Assets</h2>

			<div style="overflow-x:scroll;"><table class="table">
				<thead>
					<tr>
						<th>Phone</th>
						<th>category</th>
						<th>Price</th>
						
					</tr>
				</thead>
				<?php 

	    		$sql = "SELECT * FROM assets WHERE owner_id = '$id' AND owner = '$username' ORDER BY id DESC";
	    		$query = mysqli_query($data, $sql);
	    		if (mysqli_num_rows($query) > 0) {

	    			while ($result = mysqli_fetch_assoc($query)) {
    				$id = $result['id'];
    				$phone=$result['title'];
    				$category=$result['category'];
    				$model=$result['model'];
    				$price=$result['price'];
    				$date = $result['date'];
    				$image = $result['img'];
    				$total = total_assets($data,$username);
	    		?>
				<tbody>
					<tr>
						<td><?=$phone . " " . $model?></td>
						<td>
						<a href="<?=$image?>"><img src="<?=$image?>" class="w3-circle" height="40" width="39"></a>
						<?=$category?>
						</td>
						<td><?=$price?></td>
						<td>
							<!--<a href="" class="w3-text-green w3-small">Edit</a>-->
							<a href="delete.php?id=<?=$id?>" class="w3-text-red w3-small">Delete</a>
						</td>
					</tr>
				</tbody>
				<?php
					}
				}else{
					$total = 0;
					?>

					<tr>
					<th colspan="3" class="w3-wide w3-text-red">Empty</th>
					
					</tr>

					<?php
				}
				?>
			
					<tr>
						<th colspan="2">You worth about</th>
						
						<th>&#8358;<?=$total;?>.00</th>
						
					</tr>
				
			</table></div>

			<h2 class="my-2">My Profile</h2>

			<div style="overflow-x: scroll;"><table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Tribe</th>
						<th>Experience</th>
						<th>Birthday</th>
					</tr>
				</thead>


				<?php 

	    		$sql = "SELECT fullname,exp,tribe,DOB FROM fellows WHERE username = '$username'";
	    		$query = mysqli_query($data, $sql);
	    		if (!empty($query)) {

	    			while ($result = mysqli_fetch_assoc($query)) {
    				$fullname = $result['fullname'];
    				$exp = $result['exp'] . "years";
    				$birthday = $result['DOB'];
    				$tribe = $result['tribe'];
	    		?>
				<tbody>
					<tr class="w3-small">
						<th><?=$fullname?></th>
						<td><?=$tribe?></td>
						<th><?=$exp?></th>
						<td><?=$birthday?></td>
					</tr>
				</tbody>

				<?php
					}
				}else{
				
					?>

					<tr>
					<th colspan="3" class="w3-text-red">Complete profile & increase your chances of being hired by potential clients.</th>
					
					</tr>

					<?php
				}
				?>

			</table></div>

			<h2 class="my-2">Danger Zone</h2>
			<div class="my-2">
				<div class="w3-margin-bottom"><a href="logout.php" class="btn-light">Logout</a></div>
				<button class="btn-danger">
					<i class="fas fa-user-minus"></i> Delete my Account
				</button>
			</div>
		</section>
	</body>
</html>
	

    <?php
}



?>

