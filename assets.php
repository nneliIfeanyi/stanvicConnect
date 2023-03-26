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

</body>
</html>
<?php
}
