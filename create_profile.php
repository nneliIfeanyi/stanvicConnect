<?php
session_start();
include 'conn.php';


	    //Form validation variables..
	$surnameErr = $namesErr = $tribeErr = $dayErr = $monthErr  = $expErr= "";
	$tribe = $surname = $other_names = $exp = $day = $month = $msg2 = $msg = '';

if (check_login($data)) {

	$user_data = check_login($data);
	$username = $user_data['username'];
	$tribe = $user_data['tribe'];
	$exp = $user_data['exp'];


	if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
	    
	    $surname = mysqli_real_escape_string($data, htmlspecialchars($_POST['surname'], ENT_QUOTES, 'utf-8'));
	    $other_names = mysqli_real_escape_string($data, htmlspecialchars($_POST['other_names'], ENT_QUOTES, 'utf-8'));
	    $tribe = mysqli_real_escape_string($data, htmlspecialchars($_POST['tribe'], ENT_QUOTES, 'utf-8'));
	    $day = mysqli_real_escape_string($data, htmlspecialchars($_POST['day'], ENT_QUOTES, 'utf-8'));
	    $month = mysqli_real_escape_string($data, htmlspecialchars($_POST['month'], ENT_QUOTES, 'utf-8'));
	    $exp = mysqli_real_escape_string($data, htmlspecialchars($_POST['experience'], ENT_QUOTES, 'utf-8'));
	    $fullname = $surname . " " . $other_names;
	    $birthday = $day . " " . "-" . " " . $month;
	  
	    if (empty($surname)) {

        $surnameErr = "This field is required.";

        }elseif (empty($other_names)) {

        $namesErr = "This field is required.";

        }elseif (empty($tribe)) {
        $tribeErr = "This field is required."; 

        }elseif (empty($day)) {
         $dayErr = "This field is required"; 
       

        }elseif (empty($month)) {
         $monthErr = "This field is required"; 
       

        }elseif (empty($exp)) {
         $expErr = "This field is required"; 
       

        }else{

        	//echo "$fullname $username";
        	//exit;

        $sql = "UPDATE fellows SET fullname = '$fullname', exp = '$exp', tribe = '$tribe', DOB = '$birthday' WHERE username = '$username'";
	    	$query = mysqli_query($data, $sql);


	      if (!$query) {

	         $msg = "Something went wrong try again";

	      }else{
	        
	        $msg = "<h2 class='w3-large w3-text-green'>Profile Updated successfully..</h2>";
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
				Add to your profile.
			</h1>

			<p class="w3-small">
				Pls. provide accurate and legit informations. 
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

				<div class="w3-margin-top">

					<input type="text" placeholder="Your Surname" name="surname" value="<?=$surname?>" />
            
            <?php

            if (!empty($surnameErr)) {

            ?>
             <span class="w3-small w3-text-red"><?= $surnameErr ?></span>
             <?php
            }
          ?>
        </div>

				<div class="w3-margin-top">
					<input type="text" placeholder="other names" name="other_names" value="<?=$other_names?>" />

					<?php

            if (!empty($namesErr)) {

            ?>
             <span class="w3-small w3-text-red"><?= $namesErr ?></span>
             <?php
            }
          ?>
				</div>

				<div class="form-group">
					<input type="text" placeholder="Your Tribe" name="tribe" value="<?=$tribe?>" />
					<?php

            if (!empty($tribeErr)) {

            ?>
             <span class="w3-small w3-text-red"><?= $tribeErr ?></span>
             <?php
            }
          ?>
				</div>

				<div class="w3-row-padding">

					<div class="w3-col s5 form-group w3-margin-right">
						<select name="day">
							<option value="">Day of Birth</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
						</select>
						<?php

            if (!empty($dayErr)) {

            ?>
             <span class="w3-small w3-text-red"><?= $dayErr ?></span>
             <?php
            }
          ?>
					</div>
					<div class="w3-col s1">&nbsp</div>
					
					<div class="w3-col s6 form-group">
						<select id="" name="month">
							<option value="">Month of Birth</option>
							<option value="Jan">January</option>
							<option value="Feb">February</option>
							<option value="Mar">March</option>
							<option value="Apr">April</option>
							<option value="May">May</option>
							<option value="Jun">June</option>
							<option value="Jul">July</option>
							<option value="Aug">August</option>
							<option value="Sep">September</option>
							<option value="Oct">October</option>
							<option value="Nov">November</option>
							<option value="Dec">December</option>
						</select>
						  <?php

						  if (!empty($monthErr)) {

						  ?>
						   <span class="w3-small w3-text-red"><?= $monthErr ?></span>
						   <?php
						  }
						?>
					</div>
				</div>


				<div class="form-group">
					<input type="number" name="experience" placeholder="years of experience" value="<?=$exp?>" />
					<?php

            if (!empty($expErr)) {

            ?>
            <span class="w3-small w3-text-red"><?= $expErr ?></span>
             <?php
            }
          ?>
				</div>

				<p class="w3-serif w3-small">By submitting you consent that we share your profile to clients.</p>
				<input type="submit" name="add_asset" class="btn-primary my-1" />
				<a href="dashboard.php" class="btn-light my-1">Go Back</a>
			</form>
		</section>

	</body>
	</html>

<?php

}

