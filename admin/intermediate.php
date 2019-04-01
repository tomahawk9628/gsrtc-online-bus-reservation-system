<?php include "includes/admin_header.php"; ?>
<?php
	$bus_new_id = $_SESSION['bus_new_id']; 
	if (isset($_POST['insert-int'])) {
		# code...
		$intcity = $_POST['intcity'];
		$intkm = $_POST['intkm'];
		$intfa = $_POST['intfa'];
		$query = "INSERT INTO intermediate(bus_id, city_code, total_km, total_fare) VALUES('$bus_new_id', '$intcity', '$intkm', '$intfa')";
		$insertint = mysqli_query($connection, $query);
		if (!$insertint) {
			# code...
			die(mysqli_error($connection));
		}
		else {
			echo'<script language="javascript"> alert("Insert Successfull"); document.location = "buses.php";';
			echo '</script>';
		}
	}
?>
<div id="wrapper">
	<div id="page-wrapper">
        <div class="container-fluid">
        	<h1 class="page-header">
                Welcome
                <small><?php echo $_SESSION['s_username']; ?></small>
                <!--<small style="float:right"><a href="add_bus.php">+</a></small>-->
			</h1>
			<form action="" method="post" enctype="multipart/form-data">
				<div class = "form-group">
					<label for="intermediate">Intermediate Station</label>
						<select name = "intcity" class="form-control">
							<?php
								$query = "SELECT * FROM citycode";
								$selectcity = mysqli_query($connection, $query);
								while ($row = mysqli_fetch_assoc($selectcity)) {
								 	# code...
								 	$cityid = $row['city_code'];
								 	$citynm = $row['city_name'];
								 	echo "<option value = '$cityid'>$citynm</option>";
								 } 
							?>
						</select>
				</div>
				<div class = "form-group">
					<label for="intkm">Intermediate Kilometer</label>
					<input type="text" name="intkm" class="form-control">
				</div>
				<div class = "form-group">
					<label for="intfa">Intermediate Fare</label>
					<input type="text" name="intfa" class="form-control">
				</div>

				<br>

				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="insert-int" value="Add Intermediate">
				</div>
			</form>
		</div>
	</div>
</div>