<div class="w3-row-padding">

<div class="w3-col s5 form-group w3-margin-right">
<select name="spot">
<option value="">Your Block</option>
<option value="Block A Murada Plaza Suleja">Block A</option>
<option value="Block B Murada Plaza Suleja">Block B</option>
<option value="Block C Murada Plaza Suleja">Block C</option>
<option value="Opposite Block A Murada Plaza Suleja">Opposite Block A</option>
<option value="Opposite Block B Murada Plaza Suleja">Opposite Block B</option>
<option value="Opposite Block C Murada Plaza Suleja">Opposite Block C</option>
<option value="Elsewhere Suleja">Elsewhere</option>
</select>
<?php

if (!empty($blockErr)) {

?>
<span class="w3-small w3-text-red"><?= $blockErr ?></span>
<?php
}
?>
</div>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

if (isset($_POST['thumbs-up'])) {
	
	$post_id = $_POST['id'];
	$likes2=1;
	$sql2 = "UPDATE posts SET likes = '$likes2' WHERE id '$post_id'";
	$query2 = mysqli_query($data,$sql2);
	if ($query2) {
		echo "liked";
	}else{
		echo "not working";
	}

	exit();
	$sql="SELECT likes FROM posts WHERE id = '$post_id'";
	$query = mysqli_query($data, $sql);
	if (mysqli_num_rows($query) > 0) {
	while ($result = mysqli_fetch_assoc($query)) {
	$likes1 = $result['likes'];
	$likes2 = $likes1+1;
	echo "$likes2";
	}
	}

}	


		<!--<div class="line my-1"></div>
		<h4 class="text-primary">Skills | Specialization</h4>
		<div class="skills">
			<div class="p-1">
				<input type="checkbox" disabled checked /> Android(Softwares)
			</div>

			<div class="p-1">
				<input type="checkbox" disabled checked /> Android(Harwares)
			</div>

			<div class="p-1">
				<input type="checkbox" disabled checked /> iPhones(Hardwares)
			</div>

			<div class="p-1">
				<input type="checkbox" disabled checked /> Network Unlock
			</div>
			<div class="p-1">
				<input type="checkbox" disabled checked /> iCloud Unlock
			</div>
			<div class="p-1">
				<input type="checkbox" disabled checked /> Others
			</div>
		</div>-->
