<?php include "includes/admin_header.php"; ?>
<?php
		# code...
		# code...
		//echo $_POST['city_id'];
		$bus_up_id = $_SESSION['edit_bus_id'];
		//echo $bus_up_id;
		$query = "SELECT * FROM intermediate WHERE bus_id = $bus_up_id";
		$selectupdate = mysqli_query($connection,$query);
		if (!$selectupdate) {
			# code...
			echo "Query Failed";
			exit;
		}
		while ($row = mysqli_fetch_assoc($selectupdate)) {
		# code...
		//$city_new_id = $row['bus_id'];
		//$city_code = $row['city_code'];
		$intcode = $row['city_code'];
		$intkm = $row['total_km'];
		$intfa = $row['total_fare'];
		}
	//echo $city_up_id;
	//echo $selectupdate;
	if (isset($_POST['updateint'])) {
		# code...
		$bus_up_id = $_SESSION['edit_bus_id'];
		$intcode = $_POST['ints'];
		$intkm = $_POST['intkm'];
		$intfa = $_POST['intfa'];
		$query = "UPDATE intermediate SET city_code = '$intcode', total_km = '$intkm', total_fare = '$intfa' WHERE bus_id = '$bus_up_id'";
		$update_int = mysqli_query($connection, $query);
		if (!$update_int) {
		 	# code...
		 	die("Query Failed");
		 } 
		else {
			echo '<script language = "javascript">alert("Update Successfull"); document.location = "buses.php"';
			echo '</script>';
		 }
	}
?><?php //include"admin_navigation.php"; ?>
<div id="wrapper">
	<div id="page-wrapper">
		<div class="container-fluid">
			<h1 class="page-header">
				Welcome<small><?php echo " ".$_SESSION['s_username']; ?></small>
			</h1>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="source">Intermediate Station</label>
					<!-- <input value="<?php echo $city_name; ?>" type="text" class="form-control" name="ints"> -->
					<select name="ints" class="form-control">
						<?php
							$query = "SELECT * FROM citycode";
							$selectcity = mysqli_query($connection, $query);
							if (!$selectcity) {
							 	# code...
							 	die(mysqli_error($selectcity));
							 }
							 else {
							 	while ($row = mysqli_fetch_assoc($selectcity)) {
							 		# code...
							 			$citycode = $row['city_code'];
							 			$cityname = $row['city_name'];
						?>
						<option value="<?php echo $citycode; ?>" <?php if($intcode == $citycode) echo "selected = selected"; ?>><?php echo $cityname; ?></option>
					<?php } } ?>
					</select>
				</div>

				<div class="form-group">
					<label for="destination">Intermediate Kilometers</label>
					<input value="<?php echo $intkm; ?>" type="text" class="form-control" name="intkm">
				</div>

				<div class="form-group">
					<label for="destination">Intermediate Fare</label>
					<input value="<?php echo $intfa; ?>" type="text" class="form-control" name="intfa">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="updateint" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>
<?php include"includes/admin_footer.php"; ?>