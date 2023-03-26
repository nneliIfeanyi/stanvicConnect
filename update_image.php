<?php
session_start();
include 'conn.php';

$user_data = check_login($data);
$id = $user_data['id'];
$username = $user_data['username'];
$pic = $user_data['img'];
$imgErr = $msg = '';

if ($_GET['id']) {
$id = $_GET['id'] ?? null;
$imgErr = $msg = '';
}else{ 

if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
$id = $_POST['id'];
$image_file = $_FILES['profile_pic']['name'];
$file_nameArr = explode(".", $image_file);
$extension = end($file_nameArr);
$ext = strtolower($extension);
$unique_name = rand(100, 999).rand(100, 999).'.'.$ext;

$image_folder = "img/".$unique_name;
$db_image_file = "img/".$unique_name;

$sql = "UPDATE fellows SET img = '$db_image_file' WHERE id = '$id'";
$query = mysqli_query($data, $sql);
if (!$query) {

$msg = "Something went wrong try again";

}else{
$id = $user_data['id'];

move_uploaded_file($_FILES['profile_pic']['tmp_name'],$image_folder);
$msg = "<h2 class='w3-large w3-text-green'>Successfull..</h2>";
?>
<meta http-equiv="refresh" content=".002; dashboard.php">

<?php

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
			Passport
		</h1>

		<p class="user">
			<?=$msg?>
		</p>
	<div>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data"> 

		<label class="w3-text-orange w3-opacity-min"><b>Not more than 250kb</b></label>
         <div class="w3-card w3-padding-small">
            <input type="file" name="profile_pic" style="background-color: white;">
         </div>
         <span class="w3-small w3-tag w3-red"><?= $imgErr ?></span>
        
        <div class="w3-margin-bottom">
        	<input type="hidden" name="id" value="<?=$id?>">
            <input type="submit" name="add" value="Add Profile Pic" class="w3-padding-small btn-primary w3-round-large">
            <a href="dashboard.php" class="btn-light">goBack</a>
        </div>

        </form>
	</div>
 </section>
	