<?php
session_start();
include 'conn.php';

if (check_login($data)) {

	$user_data = check_login($data);
	$id = $user_data['id'];
	$username = $user_data['username'];
	$pic = $user_data['img'];
	$msg = '';


if (isset($_POST['submit'])) {
	$post_id = $_POST['post_id'];
	$comment1 = mysqli_real_escape_string($data, htmlspecialchars($_POST['comment'], ENT_QUOTES, 'utf-8'));
	$comment = trim($comment1);
	$date = date('Y-m-d');
	$time = date('h:i');
	
    $sql = "INSERT INTO comments (post_id,comment,_by,by_id,by_img) VALUES ('$post_id','$comment','$username','$id','$pic')";
    $query = mysqli_query($data, $sql);


      if (!$query) {

         $msg = "Something went wrong try again";
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
         		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         		<title>Comments</title>
         	</head>
         	<body>
         	<?php

         	include 'header.php';
         	?>
         		
         			<section class="container">
         				<p class="user w3-text-green">
         					<b><?=$msg?></b>
         				</p>
         			</section>
         		</body>
         		</html>
         		<meta http-equiv="refresh" content="3; comment.php?post_id=<?=$post_id?>">
         <?php

      }else{

      	$msg = "Your comment has gone live";
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
      			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      			<title>Comments</title>
      		</head>
      		<body>
      		<?php

      		include 'header.php';
      		?>
      			
      				<section class="container">
      					<p class="user w3-text-green">
      						<b><?=$msg?></b>
      					</p>
      				</section>
      			</body>
      			</html>
      			<meta http-equiv="refresh" content="3; comment.php?post_id=<?=$post_id?>">
      	<?php

      }
}


}

