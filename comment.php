<?php
session_start();
include 'conn.php';

if (check_login($data)) {

	$user_data = check_login($data);
	$id = $user_data['id'];
	$username = $user_data['username'];
	$pic = $user_data['img'];
	$msg = '';

	if ($_GET['post_id']) {
		$post_id = $_GET['post_id'];

		$sql="SELECT * FROM posts WHERE id = '$post_id'";
		$query = mysqli_query($data, $sql);
		if (mysqli_num_rows($query) > 0) {
			$result = mysqli_fetch_assoc($query);
			$post_id = $result['id'];
			$post=$result['post'];
			$posted_by=$result['_by'];
			//$thumbs_up=$result['like'];
			//$thumbs_down=$result['dislike'];
			$date = $result['_date'];
			$time = $result['_time'];

			$sql2="SELECT img FROM fellows WHERE username = '$posted_by'";
			$query2 = mysqli_query($data, $sql2);
				if (mysqli_num_rows($query2) > 0) {
					$output = mysqli_fetch_assoc($query2);
					$image = $output['img'];
				}
		}

	}else{

			header('Location:blog.php');
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Comments</title>
	</head>
	<body>
	<?php

	include 'header.php';
	?>
		
			<section class="container">
				<a href="blog.php" class="btn-light">Back to Posts</a>
				<p class="user w3-text-green">
					<b><?=$msg?></b>
				</p>

				<div class="post bg-white p-1 my-1">
							<div>
						<a href="">
							<img src="<?=$image?>" class="circle" />
							<h4><?=$posted_by?></h4>
						</a>
					</div>

					<div>
						<p class="my-1"><?=$post?></p>
					</div>
				</div>

				<div class="post-form">
					<div class="post-form-header bg-primary">
						<h4>Leave a Comment...</h4>
					</div>
					<form action="commented.php" method="POST" class="form my-1">
						<input type="hidden" name="post_id" value="<?=$post_id?>">
						<textarea name="comment" placeholder="Comment On This Post..." cols="30" rows="5"></textarea>
						<input type="submit" name="submit" value="Submit" class="btn-dark my-1" />
					</form>

					<h4 class="text-primary"><b>Recent Comments</b></h4>

					<?php
					$sql="SELECT * FROM comments WHERE post_id = '$post_id' ORDER BY id DESC";
					$query = mysqli_query($data, $sql);
					if (mysqli_num_rows($query) > 0) {
					while ($result = mysqli_fetch_assoc($query)) {
					$comment_id = $result['id'];
					$comment=$result['comment'];
					$_by=$result['_by'];
					$by_id=$result['by_id'];
					$by_image=$result['by_img'];
					?>






					<div class="posts">
						
						<div class="post bg-white my-1 p-1">
							<img src="<?=$by_image?>" width="80px" hieght="80px" class="w3-circle">
							<div>
								<p class="my-1"><?=$comment?></p>

								<a href="view_profile.php?id=<?=$by_id?>" class="btn-light"><span><b>By:</b></span><?=$_by?></a>
							</div>
						</div>

						
					</div>

					<?php
						}
						}
					?>



				</div>

				<?php
				include 'footer.php';
				?>
			</section>
		</body>
	</html>

<?php
}

