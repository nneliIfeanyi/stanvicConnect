<?php
session_start();

include 'conn.php';


if (isset($_GET['id'])) {
	
	$id = $_GET['id'];

	$sql = "DELETE FROM assets WHERE id = '$id'";
	$query = mysqli_query($data, $sql);

	if ($query) {
		
		?>
			<script type="text/javascript">
				alert('Deleted Successfully')
			</script>
			<meta http-equiv="refresh" content="1; dashboard.php">
		<?php

	}else{

		?>
			<script type="text/javascript">
				alert('An error occured while deleting Asset.')
			</script>
			<meta http-equiv="refresh" content="2; dashboard.php">
		<?php


	}

}