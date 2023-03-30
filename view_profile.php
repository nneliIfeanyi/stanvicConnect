<?php
session_start();
include 'conn.php';

if ($_GET['id']) {
$id = $_GET['id'];


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

		
	<?php

		include 'header.php';
		$sql = "SELECT * FROM fellows WHERE id = '$id'";
		$query = mysqli_query($data, $sql);
		if (mysqli_num_rows($query) > 0) {

		while ($result = mysqli_fetch_assoc($query)) {
		$id = $result['id'];
		$username=$result['username'];
		$spot=$result['address'];
		$b_day = $result['DOB'];
		$total = total_assets($data,$username);
		$profile_pic = $result['img'];
		$fone = $result['phone'];
	?>

	<section class="container">
		<a href="fellows.php" class="btn-light">Back to Profiles</a>

		<div class="profile-grid my-1">

			<!--=== TOP ===-->
			<div class="profile-top bg-primary p-2">
				<img src="<?=$profile_pic?>" class="round-img my-1" />

				<h1 class="large"><?=$username?></h1>
				<p class="lead"><?=$spot?></p>
				<?php

			  	if (!empty($b_day)) {

		  		?>
		  		<p><b>Birthday : </b><?=$b_day?></p>
		  		<?php
			  	}
			 
				?>
				
				<p class="lead"><b class="w3-small">Net Worth :</b><span class="w3-xlarge">&#8358;<?=$total;?>.00</span></p>

				
			</div>
		</div>
		<?php
			}
		}
		?>


				<h4 class="text-primary">Assets</h4>
				<table class="table">
				<thead>
				<tr>
					<th>Phone</th>
					<th>category</th>
					<th>Price</th>
					
				</tr>
				</thead>
				<?php
				$sql = "SELECT * FROM assets WHERE owner_id = '$id' ORDER BY id DESC";
	    		$query = mysqli_query($data, $sql);
	    		if (mysqli_num_rows($query) > 0) {

	    			while ($result = mysqli_fetch_assoc($query)) {
    				$id = $result['id'];
    				$phone=$result['title'];
    				$category=$result['category'];
    				$model=$result['model'];
    				$price=$result['price'];
    				$date = $result['date'];
	    		?>
				<tbody>
					<tr>
						<td><?="$phone $model"?></td>
						<td><b><?=$category?></b></td>
						<td><?=$price?></td>
					</tr>
				</tbody>
				<?php
					}
				}else{
				
					?>

					<tr>
					<th colspan="3" class="w3-wide w3-text-red">Empty</th>
					
					</tr>

					<?php
				}
				?>
				
			</table>
			<div class=" w3-center"><a href="tel:+234<?=$fone?>" class="btn-primary">Give <?=$username?> a call</a></div>
			 
	</section>	

	<?php

}