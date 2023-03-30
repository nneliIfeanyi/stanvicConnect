<?php
session_start();
include '../conn.php';
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
		<meta name="author" content="" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<link rel="stylesheet" type="text/css" href="../stylesheets/style.css" />
		<link rel="stylesheet" type="text/css" href="../stylesheets/w3.css" />
		
		<title>Assets</title>
	</head>
<body>

<!--=== NAVBAR ===-->
<?php

include 'header.php';
?>
<section class="container">
	<div class="w3-row-padding">
		<div class="w3-col s9 m9 l9">
		<h1 class="large text-primary">
			Assets <b><span class="w3-small w3-text-teal w3-wide">(Down Board)</span></b>
		</h1>
		</div>
		<div class="w3-col s3 m3 l3">
		<div class="w3-right">
		<a href="#"  onclick="myFunction('Demo1')" class="w3-btn"><img src="../images/menu.png" height="30" width="35" style="filter: invert(80%);"></a>
		</div>
		</div>


		<div class="w3-text-light-grey w3-hide w3-animate-top" id="Demo1" style="background-color:rgba(0,0,0, 0.04);">

		<ul class="w3-ul" style="border-top: none;">

		<li class="w3-block w3-button"><a href="assets_panels.php" class="w3-hover-lightgrey w3-left-align w3-button w3-block"><i>Assets (Panels)</i></a></li>

		<li class=" w3-block w3-button"><a href="assets_simtray.php" class="w3-hover-lightgrey w3-left-align w3-button w3-block"><i>Assets (Sim Tray)</i></a></li>

		<li class="w3-block w3-button"><a href="assets_cameras.php" class="w3-hover-lightgrey w3-left-align w3-button w3-block"><i>Assets (Cameras)</i></a></li>

		<li class="w3-block w3-button"><a href="assets_fingerprint.php" class="w3-hover-lightgrey w3-left-align w3-button w3-block"><i>Assets (Finger Print)</i></a></li>

		<li class="w3-block w3-button"><a href="assets_lcd.php" class="w3-hover-lightgrey w3-left-align w3-button w3-block"><i>Assets (L.C.D)</i></a></li>
		<li class="w3-block w3-button"><a href="others.php" class="w3-hover-lightgrey w3-left-align w3-button w3-block"><i>Assets (Others)</i></a></li>
		</ul>
		</div>
			

		<script type="text/javascript">

		function myFunction(id) {
		var x = document.getElementById(id);
		if (x.className.indexOf("w3-show") == -1) {
		x.className += " w3-show";
		} else { 
		x.className = x.className.replace(" w3-show", "");
		}
		}
		</script>

		</div>
	</div>
<?php

$sql = "SELECT * FROM assets WHERE category = 'Down Board' ORDER BY id DESC";
$query = mysqli_query($data, $sql);
if (mysqli_num_rows($query) > 0) {

	while ($result = mysqli_fetch_assoc($query)) {
	$id = $result['owner_id'];
	$title=$result['title'];
	$model=$result['model'];
	$price=$result['price'];
	$owner=$result['owner'];
	$date = $result['date'];
	$category = $result['category'];
	$image = $result['img'];
	$condition = $result['cond_tion'];
?>

<div class="w3-row-padding w3-center w3-card-2 w3-border w3-margin-bottom">
	<div class="w3-half w3-padding-large w3-padding-16">
		<a href="<?=$image?>"><img src="<?=$image?>" height="170px" width="65%"></a>
	</div>
	<div class="w3-half w3-padding-16">
	<ul class="w3-ul w3-margin">
		<li class="w3-xlarge w3-padding-small"><?="$title $model $category"?></li>
		<li class="w3-padding-small">
		<span class="w3-small">Condition..&nbsp;</span><span class="w3-grey w3-padding-small"><?=$condition?></span><br>
		<span class="w3-xlarge"><b>&#8358;<?=$price?>.00</b></span>
		</li>
		<li class="w3-padding-small">Posted by <?=$owner?><br>On <?=$date?></li>
		<li class="w3-margin-top">
		<div class=" w3-center"><a href="../view_profile.php?id=<?=$id?>" class="btn-primary">Hook Up with <?=$owner?></a></div>
		</li>
	</ul>
	</div>
</div>


<?php
}
}else{

	?>
	<div class="w3-row-padding w3-center w3-card-2 w3-border w3-margin-bottom">
	<div class="w3-half w3-padding-16">
	<ul class="w3-ul w3-margin">
		<li class="w3-xlarge w3-text-red w3-padding-small">Nothing here</li>
		<div class=" w3-center w3-padding-small">Be the first to <a href="add_asset.php" class="btn-primary">Upload</a></div>
		</li>
	</ul>
	</div>
	</div>
	<?php
}

include '../footer.php';


?>
</section>
</body>
</html>
<?php
}
