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
		<title>Suggestion Box</title>
	</head>
	<body>

		

		<div class="w3-center w3-padding w3-margin">
			<h1>Work in Progress, <br><span class="w3-medium">Come back later.</span></h1>
			<a href="index.php" class="w3-btn w3-padding">Go Back</a>
		</div>


	</body>
	</html>
	<?php

}