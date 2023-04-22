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
	$post_id = $_POST['post_id'];
	$comment1 = mysqli_real_escape_string($data, htmlspecialchars($_POST['comment'], ENT_QUOTES, 'utf-8'));
	$comment = trim($comment1);
	$date = date('Y-m-d');
	$time = date('h:i');
	
    $sql = "INSERT INTO comments (post_id,comment,_by,by_id,by_img) VALUES ('$post_id','$comment','$username','$id','$pic')";
    $query = mysqli_query($data, $sql);


      if (!$query) {

         $msg = "Something went wrong try again";


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

