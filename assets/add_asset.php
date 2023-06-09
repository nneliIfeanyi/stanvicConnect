<?php
session_start();
include '../conn.php';

if (check_login($data)) {

	$user_data = check_login($data);
	$owner_id = $user_data['id'];
	$owner = $user_data['username'];

	    //Form validation variables..
	$titleErr = $modelErr = $categoryErr = $conditionErr = $imgErr = $priceErr = "";
	$title = $model = $category = $price = $msg2 = $msg = '';

	if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
	    
	    $title = mysqli_real_escape_string($data, htmlspecialchars($_POST['title'], ENT_QUOTES, 'utf-8'));
	    $model = mysqli_real_escape_string($data, htmlspecialchars($_POST['model'], ENT_QUOTES, 'utf-8'));
	    $category = mysqli_real_escape_string($data, htmlspecialchars($_POST['category'], ENT_QUOTES, 'utf-8'));
	    $condition = mysqli_real_escape_string($data, htmlspecialchars($_POST['condition'], ENT_QUOTES, 'utf-8'));
	    $price = mysqli_real_escape_string($data, htmlspecialchars($_POST['price'], ENT_QUOTES, 'utf-8'));
	    $image_file = $_FILES['asset_pic']['name'];
	    if ($image_file) {
	    	$file_nameArr = explode(".", $image_file);
	    	$extension = end($file_nameArr);
	    	$ext = strtolower($extension);
	    	$unique_name = rand(100, 999).rand(100, 999).'.'.$ext;
	    	$image_folder = "img/".$unique_name;
	    	$db_image_file = "img/".$unique_name;

	    }else{
	    	$image_file = null;
	    	$db_image_file = null;
	    	$image_folder = null;
	    }
	    if (empty($category)) {

        $categoryErr = "Choose Asset Category..";

        }elseif (empty($title)) {

        $titleErr = "Input phone name..";

        }elseif (empty($model)) {
        $modelErr = "Input model number"; 

        }elseif (empty($condition)) {
        $conditionErr = "Select condition of Asset"; 

        }elseif (empty($price)) {
         $priceErr = "Put price na !"; 
       

        }else{

        $sql = "INSERT INTO assets (category,title,model,price,owner_id,owner,img,cond_tion) VALUES ('$category','$title','$model','$price','$owner_id','$owner','$db_image_file','$condition')";
	    $query = mysqli_query($data, $sql);


	      if (!$query) {

	         $msg = "Something went wrong try again";

	      }else{
	      	move_uploaded_file($_FILES['asset_pic']['tmp_name'],$image_folder);
	        
	        $msg = "<h2 class='w3-large w3-text-green'><b>Asset added successfully..</b></h2>";
	        ?>
	        <meta http-equiv="refresh" content="2; ../dashboard.php">

	        <?php
	        
	      } 

        }
	}


		include 'header.php';
	?>

	<!--=== CONTAINER ===-->

		<section class="container">
			<h1 class="large text-primary">
				Showcase Your Asset.
			</h1>

			<!--<p class="w3-small">
				It could be Working panels, LCDs, Down_boards etc.. 
			</p>-->

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


			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="form" enctype="multipart/form-data">

				<label class="w3-opacity-min w3-small"><span class="w3-text-blue">(Optional): </span>Add an Image for the Asset you are uploading.. Not more than 250kb.</label>
         <div class="w3-padding-small w3-grey">
            <input type="file" id="file-upload" name="asset_pic" style="background-color: white;">
         </div>

          <?php

            if (!empty($imgErr)) {

            ?>
             <span class="w3-small w3-padding-small w3-tag w3-red"><?= $imgErr ?></span>
             <?php
            }
          ?>
        

				<div class="w3-margin-top">
            <select id="" name="category" class="w3-text-dark-grey w3-select">
              <option value="">Select category--</option>
               <option value="Working Phone">Working Phone</option>
              <option value="Working Panel">Working Panel</option>
              <option value="LCD">Screen | LCD</option>
              <option value="Down board">Down Board</option>
              <option value="Camera">Camera</option>
               <option value="Sim Tray">Sim Tray</option>
              <option value="Finger Print">Finger Print</option>
              <option value="Power flex">Power Flex</option>
              <option value="Others">Others</option>
            </select>
            <?php

            if (!empty($categoryErr)) {

            ?>
             <span class="w3-small w3-padding-small w3-tag w3-red"><?= $categoryErr ?></span>
             <?php
            }
          ?>
        </div>

				<div class="form-group w3-margin-top">
					<select name="title">
					<option value="">Which Phone</option>
					<option value="Samsung">Samsung</option>
					<option value="Huawei">Huawei</option>
					<option value="Apple">iPhone</option>
					<option value="Oppo">Oppo</option>
					<option value="Sony">Sony</option>
					<option value="Vivo">Vivo</option>
					<option value="Gionee">Gionee</option>
					<option value="Infinix">Infinix</option>
					<option value="Tecno">Tecno</option>
					<option value="Samsung(copy)">Samsung(copy)</option>
					<option value="iPhone(copy)">iPhone(copy)</option>
					<option value="Nokia">Nokia</option>
					<option value="Alcatel">Alcatel</option>
					<option value="Itel">Itel</option>
					</select>

					<?php

                    if (!empty($titleErr)) {

                    ?>
                     <span class="w3-small w3-padding-small w3-tag w3-red"><?= $titleErr ?></span>
                     <?php
                    }
	                ?>
				</div>

				<div class="form-group">
					<input type="text" placeholder="Model Number" name="model" value="<?=$model?>" />
					<?php

                    if (!empty($modelErr)) {

                    ?>
                     <span class="w3-small w3-padding-small w3-tag w3-red"><?= $modelErr ?></span>
                     <?php
                    }
	                ?>
				</div>

				<div class="form-group">
					<select name="condition">
					<option value="">Condition</option>
					<option value="Brand New(followCome)">Brand New(followcome)</option>
					<option value="2nd Hand(followCome)">2nd Hand(followCome)</option>
					<option value="Brand New(marketOwn)">Brand New(marketOwn)</option>
					<option value="2nd Hand(MarketOwn)">2nd Hand(MarketOwn)</option>
					</select>
					<?php

                    if (!empty($conditionErr)) {

                    ?>
                     <span class="w3-small w3-padding-small w3-tag w3-red"><?= $conditionErr ?></span>
                     <?php
                    }
	                ?>
				</div>

				<div class="form-group">
					<input type="number" placeholder="How Much" name="price" value="<?=$price?>" />
					<?php

                    if (!empty($priceErr)) {

                    ?>
                     <span class="w3-small w3-padding-small w3-tag w3-red"><?= $priceErr ?></span>
                     <?php
                    }
	                ?>
				</div>
				<p class="w3-serif w3-small">Do ensure your Asset is in perfect working condition.</p>
				<input type="submit" onclick="return VerifyUploadSizeIsOk()" name="add_asset"  class="btn-primary my-1" />

				<a href="../dashboard.php" class="btn-light my-1">Go Back</a>
			</form>
		</section>

		<script type="text/javascript">
 	function VerifyUploadSizeIsOk() {
 		var UploadFieldID = "file-upload";
 		var MaxSizeInBytes = 262144;
 		var fld = document.getElementById(UploadFieldID);
 		if (fld.files && fld.files.length == 1 && fld.files[0].size > MaxSizeInBytes) {

 			alert("Image size too large, The file must be less than 250kb");
 			return false;
 		}
 		return true;
 	}
 </script>

	</body>
	</html>

<?php

}

