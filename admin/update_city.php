<?php include "includes/admin_header.php"; ?><?php
	if (isset($_POST['action1'])) {
		# code...
		if ($_POST['action1'] == "Update") {
			# code...
			//echo $_POST['city_id'];
			$city_up_id = $_POST['city_id'];
			$query = "SELECT * FROM citycode WHERE city_code = $city_up_id";
			$selectupdate = mysqli_query($connection,$query);
			if (!$selectupdate) {
				# code...
				echo "Query Failed";
			}
			while ($row = mysqli_fetch_assoc($selectupdate)) {
			# code...
			$city_new_id = $row['city_code'];
			$city_name = $row['city_name'];
			}
		}
	}
	//echo $city_up_id;
	//echo $selectupdate;
	if (isset($_POST['update'])) {
		# code...
		$cityname = $_POST['cityname'];
		$city_new_id = $_POST['city_code'];
		$query = "UPDATE citycode SET city_name = '$cityname' WHERE city_code = $city_new_id";

		$updatecity = mysqli_query($connection,$query);
		if($updatecity) {
			echo '<script language = "javascript"> alert("Update Successfull"); document.location = "cities.php";';
			echo '</script>';
		}
		else {
			header("location: includes/demo.php");
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
					<!-- <label for="source">City Id</label> -->
					<input value="<?php echo $city_new_id; ?>" type="hidden" class="form-control" name="city_code">
				</div> 

				<div class="form-group">
					<label for="destination">City Name</label>
					<input value="<?php echo $city_name; ?>" type="text" class="form-control" name="cityname">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="update" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>
<?php include"includes/admin_footer.php"; ?>