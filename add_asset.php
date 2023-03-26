<?php
session_start();
include 'conn.php';

if (check_login($data)) {

	$user_data = check_login($data);
	$owner_id = $user_data['id'];
	$owner = $user_data['username'];

	    //Form validation variables..
	$titleErr = $modelErr = $categoryErr = $priceErr = "";
	$title = $model = $category = $price = $msg2 = $msg = '';

	if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
	    
	    $title = mysqli_real_escape_string($data, htmlspecialchars($_POST['title'], ENT_QUOTES, 'utf-8'));
	    $model = mysqli_real_escape_string($data, htmlspecialchars($_POST['model'], ENT_QUOTES, 'utf-8'));
	    $category = mysqli_real_escape_string($data, htmlspecialchars($_POST['category'], ENT_QUOTES, 'utf-8'));
	    $price = mysqli_real_escape_string($data, htmlspecialchars($_POST['price'], ENT_QUOTES, 'utf-8'));

	    if (empty($category)) {

        $categoryErr = "choose category..";

        }elseif (empty($title)) {

        $titleErr = "Input phone name..";

        }elseif (empty($model)) {
        $modelErr = "Input model number"; 

        }elseif (empty($price)) {
         $priceErr = "Put price na !"; 
       

        }else{

        $sql = "INSERT INTO assets (category,title,model,price,owner_id,owner) VALUES ('$category','$title','$model','$price','$owner_id','$owner')";
	    $query = mysqli_query($data, $sql);


	      if (!$query) {

	         $msg = "Something went wrong try again";

	      }else{
	        
	        $msg = "<h2 class='w3-large w3-text-green'>Asset added successfully..</h2>";
	        ?>
	        <meta http-equiv="refresh" content="2; dashboard.php">

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
				Showcase Your Asset.
			</h1>

			<p class="w3-small">
				It could be Working panels, LCDs, Down_boards etc.. 
			</p>

				<?php

			  	if (!empty($msg)) {

			  		?>
			  		<p class="user w3-text-red"><?= $msg ?></p>
			  		<?php
			  	}
			 
				?>

				<?php

			  	if (!empty($msg2)) {

			  		?>
			  		<p class="user w3-text-green"><?= $msg2 ?></p>
			  		<?php
			  	}
			 
				?>


			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="form">

				<div class="w3-card w3-margin-top">
                    <select id="" name="category" class="w3-text-dark-grey w3-select">
                      <option value="">Select category--</option>
                      <option value="panel">Working Panel</option>
                      <option value="lcd">Screen | LCD</option>
                      <option value="d_board">D_Board</option>
                      <option value="phone">Working Phone</option>
                      <option value="others">Others</option>
                    </select>
                    <?php

                    if (!empty($categoryErr)) {

                    ?>
                     <span class="w3-small w3-tag w3-red"><?= $categoryErr ?></span>
                     <?php
                    }
	                ?>
                </div>

				<div class="form-group w3-margin-top">
					<input type="text" placeholder="* which phone" name="title" value="<?=$title?>" />

					<?php

                    if (!empty($titleErr)) {

                    ?>
                     <span class="w3-small w3-tag w3-red"><?= $titleErr ?></span>
                     <?php
                    }
	                ?>
				</div>

				<div class="form-group">
					<input type="text" placeholder="* Model Number" name="model" value="<?=$model?>" />
					<?php

                    if (!empty($modelErr)) {

                    ?>
                     <span class="w3-small w3-tag w3-red"><?= $modelErr ?></span>
                     <?php
                    }
	                ?>
				</div>

				<div class="form-group">
					<input type="number" placeholder="How Much" name="price" value="<?=$price?>" />
					<?php

                    if (!empty($priceErr)) {

                    ?>
                     <span class="w3-small w3-tag w3-red"><?= $priceErr ?></span>
                     <?php
                    }
	                ?>
				</div>
				<p class="w3-serif w3-small">Do ensure your Asset is in perfect working condition.</p>
				<input type="submit" name="add_asset" class="btn-primary my-1" />
				<a href="dashboard.php" class="btn-light my-1">Go Back</a>
			</form>
		</section>

	</body>
	</html>

<?php

}

