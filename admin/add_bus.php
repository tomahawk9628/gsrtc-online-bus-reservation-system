<?php include "includes/admin_header.php"; ?>
<?php 
	if (isset($_POST['insert-bus'])) {
		
		$bus_type = $_POST['bus_type'];
		$source = $_POST['source'];
		$destination = $_POST['destination'];
		$deptime = $_POST['deptime'];
		$destime = $_POST['destime'];
		$totalkm = $_POST['totalkm'];
		$totalfa = $_POST['totalfa'];
		$seats = $_POST['seats'];


		if ($bus_type=="" || $source=="" || $destination=="" || $deptime=="" || $destime=="" || $totalkm=="" || $totalfa=="") {
			echo "**All Fields Mandatory";
		}
		else {
			$query = "INSERT INTO timetable(ori_place_code, dest_place_code, dept_time, desti_time, totalkm, total_fare, seats, bus_type) VALUES('$source','$destination','$deptime','$destime','$totalkm','$totalfa','$seats','$bus_type')";
			$bus_entry = mysqli_query($connection,$query);

			if (!$bus_entry) {
				die("Query Failed");
			}
			else {
				$_SESSION['bus_new_id'] = mysqli_insert_id($connection);
				//echo $bus_new_id;
				echo '<script language="javascript">document.location="intermediate.php";';
				echo '</script>';
			}
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
				<div class="form-group">
					<label for="source">Source Station</label>
					<select name="source" class="form-control">
						<?php
							$query = "SELECT * FROM citycode";
							$select_category = mysqli_query($connection,$query);
							if (!$select_category) {
							 	# code...
							 	die("Query Failed".mysqli_error());
							 } 
							 while($row = mysqli_fetch_assoc($select_category))
							 {
							 	$city_code = $row['city_code'];
							 	$city_name = $row['city_name'];
							 	echo "<option value='$city_code'>$city_name</option>";

							 }
						?>
					</select>
				</div>

				<div class="form-group">
					<label for="destination">Destination Station</label>
					<select name="destination" class="form-control">
						<?php
							$query = "SELECT * FROM citycode";
							$select_category = mysqli_query($connection,$query);
							if (!$select_category) {
							 	# code...
							 	die("Query Failed".mysqli_error());
							 } 
							 while($row = mysqli_fetch_assoc($select_category))
							 {
							 	$city_code = $row['city_code'];
							 	$city_name = $row['city_name'];
							 	echo "<option value='$city_code'>$city_name</option>";

							 }
						?>
					</select>

				</div>

	
	<div class="for">
		<label for="bus_type">Bus Type</label>

		<select name="bus_type" class="form-control">
			<?php
				$query = "SELECT * FROM bustype";
				$select_category = mysqli_query($connection,$query);
				if (!$select_category) {
				 	# code...
				 	die("Query Failed".mysqli_error());
				 } 
				 while($row = mysqli_fetch_assoc($select_category))
				 {
				 	$bus_type_id = $row['bus_type_id'];
				 	$bus_type = $row['bus_type'];
				 	echo "<option value='$bus_type_id'>$bus_type</option>";

				 }
			?>
		</select>

	</div>
	<br>
	<div class="form-group">
		<label for="deptime">Depature Time</label>
		<input type="text" class="form-control" name="deptime">
	</div>

	<div class="form-group">
		<label for="destime">Destination Time</label>
		<input type="text" class="form-control" name="destime">
	</div>

	<div class="form-group">
		<label for="totalkm">Total Kilometers</label>
		<input type="text" class="form-control" name="totalkm">
	</div>

	<div class="form-group">
		<label for="=totalfa">Total Fare</label>
		<input type="text" class="form-control" name="totalfa">
	</div>

	<div class="form-group">
		<label for="=seats">Seats</label>
		<input type="text" class="form-control" name="seats">
	</div>

	<br>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="insert-bus" value="Add Bus">
	</div>
</form>
</div></div></div>
<?php include"includes/admin_footer.php"; ?>



