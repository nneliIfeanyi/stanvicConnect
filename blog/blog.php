<?php
session_start();
include '../conn.php';

if (check_login($data)) {

	$user_data = check_login($data);
	$id = $user_data['id'];
	$username = $user_data['username'];
	$pic = $user_data['img'];
	$msg = '';

if (isset($_POST['submit'])) {
	
	$post1 = mysqli_real_escape_string($data, htmlspecialchars($_POST['post'], ENT_QUOTES, 'utf-8'));
	$post = trim($post1);
	$date = date('Y-m-d');
	$time = date('h:i');
	if (empty($post1)) {
		
		$err = '';
	}else{


		$sql = "INSERT INTO posts (post,_by,_date,_time) VALUES ('$post','$username','$date','$time')";
		$query = mysqli_query($data, $sql);


		  if (!$query) {

		     $msg = "Something went wrong try again";

		  }else{

		  	$msg = "Your post has gone live";
		  	?>
		  	<meta http-equiv="refresh" content="2; blog.php">
		  	<?php
		  }

	}
	
   
}

include 'header.php';
?>
		

	<section class="container">
			<h1 class="large text-primary">
			Blog Posts..
			</h1>

			<p class="user">
				<img src="../img/avatar_guy.png"> Welcome to the community
			</p>

			<p class="user w3-text-green">
				<b><?=$msg?></b>
			</p>

			<div class="post-form">
				<div class="post-form-header bg-primary" id="post">
					<h4>Say Something...</h4>
				</div>

				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="form my-1">
					<textarea name="post" placeholder="Create A Post..." cols="30" rows="5"></textarea>
					<input type="submit" name="submit" value="Submit" class="btn-dark my-1" />
				</form>

				<div class="posts w3-padding-16">
					<h4 class="text-primary"><b>Recent Posts</b></h4>

					<?php
					$sql="SELECT * FROM posts ORDER BY id DESC";
					$query = mysqli_query($data, $sql);
					if (mysqli_num_rows($query) > 0) {
					while ($result = mysqli_fetch_assoc($query)) {
					$post_id = $result['id'];
					$post=$result['post'];
					$posted_by=$result['_by'];
					

					$sql2="SELECT img FROM fellows WHERE username = '$posted_by'";
					$query2 = mysqli_query($data, $sql2);
					if (mysqli_num_rows($query2) > 0) {
					$output = mysqli_fetch_assoc($query2);
					$image = $output['img'];

					?>
					<div class="post bg-white p-1 my-1">
						<div>
						
						<img src="<?=$image?>" class="circle" />
						<h4><?=$posted_by?></h4>
						
						</div>

						<div>
							<p class="my-1"><?=$post?></p>
							<?php

							$sql3 = "SELECT * FROM comments WHERE post_id = '$post_id'" ;
							$query3 = mysqli_query($data, $sql3);

							if ($query3) {
							$i= mysqli_num_rows($query3);
							 ?>
							<a href="comment.php?post_id=<?=$post_id?>" class="btn-primary"><i class="w3-large fa fa-comment"></i>&nbsp;<span><?=$i?> </span>Discussion</a>
							<?php
							}
							?>
							
						</div>
					</div>




					<?php
						}
						}
						}else{

							?>
							<div class="w3-row-padding w3-center w3-card-2 w3-border w3-margin-bottom">
							<div class="w3-half w3-padding-16">
							<ul class="w3-ul w3-margin">
								<li class="w3-xlarge w3-text-red w3-padding-small">Nothing Posted yet</li>
								<div class=" w3-center w3-padding-small">Be the first to <a href="blog.php" class="btn-primary">Post</a></div>
								</li>
							</ul>
							</div>
							</div>
							<?php
						}
					?>
				</div>
			</div>

			
		</section>


	</body>
	</html>
	<?php

}