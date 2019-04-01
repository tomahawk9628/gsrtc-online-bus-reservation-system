
<?php include "includes/admin_header.php"; ?>
<?php

if (isset($_POST['busid'])) 
{

	$edit_bus_id = $_POST['busid'];

	$query = "SELECT *  FROM  timetable WHERE bus_id=$edit_bus_id";
	$select_posts = mysqli_query($connection,$query);
	while($row = mysqli_fetch_assoc($select_posts)) 
	{
    	$bus_id1 = $edit_bus_id;
    	$source = $row['ori_place_code'];
   	 	$destination = $row['dest_place_code'];
    	$category = $row['bus_type'];
    	$deptime = $row['dept_time'];
    	$destime = $row['desti_time'];
    	$totalkm = $row['totalkm'];
    	$totalfa = $row['total_fare'];
    	$seats = $row['seats'];
	}
}
if (isset($_POST['update-bus']) && isset($_POST['edit_bus_id'])) {
	
	$edit_bus_id = $_POST['edit_bus_id'];
	$category = $_POST['bus_type'];
	$source = $_POST['ori_place_code'];
	$destination = $_POST['dest_place_code'];
	$title = $source . " to " . $destination;
	$deptime = $_POST['dept_time'];
    $destime = $_POST['desti_time'];
    $totalkm = $_POST['totalkm'];
    $totalfa = $_POST['total_fare'];
    $seats = $_POST['seats'];

	$query = "UPDATE timetable SET 
				ori_place_code = $source,
				dest_place_code = $destination, 
				dept_time = '$deptime', 
				desti_time = '$destime', 
				totalkm = $totalkm, 
				total_fare = $totalfa,
				seats = $seats, 
				bus_type = $category 
				WHERE bus_id=$edit_bus_id ";
	//echo $query;
	//die;
	
	//echo $title . " " . $admin;
	
	$update_bus = mysqli_query($connection,$query);
	if (!$update_bus) {
		die("Query Failed" . mysqli_error($connection));
	}
	else{
		$_SESSION['edit_bus_id'] = $edit_bus_id;
		header("location: update_intermediate.php");
	}

}
?>
<div id = "wrapper">
	<div id = "page-wrapper">
		<div class="container-fluid">
			<h1 class="page-header">
                            Welcome
                            <small><?php echo $_SESSION['s_username']; ?></small>
                            <small style="float:right"><a href="add_bus.php">+</a></small>
                        </h1>
			<form action="" method="post" enctype="multipart/form-data">
				

				<div class="form-group">
					<label for="source">Source Station</label>
					<select name="ori_place_code" class="form-control">
						<?php

						$query = "SELECT * FROM citycode";
						$get_cities = mysqli_query($connection, $query);
						while ($row = mysqli_fetch_assoc($get_cities)) {
							# code...
							$source1 = $row['city_name'];
							$code = $row['city_code'];
					?>
						<option value="<?php echo $code;?>"  <?php if($source == $code ) echo "selected=selected"; ?>>
							<?php echo $source1; ?></option>
						<?php } ?>
					</select>
				
				</div>

				<div class="form-group">
					<label for="destination">Destination Station</label>
					<select name="dest_place_code"	class="form-control">
						<?php
						$query = "SELECT * FROM citycode";
						$get_cities = mysqli_query($connection, $query);
						while ($row = mysqli_fetch_assoc($get_cities)) {
							# code...
							$destination1 = $row['city_name'];
							$code = $row['city_code'];
						?>
						<option value="<?php echo $code; ?>"  <?php if($destination == $code ) echo "selected=selected"; ?>><?php echo $destination1; ?></option>
						<?php } ?>
					</select>
				</div>

				
				
				<div class="form-group">
					<label for="via-time">Departure time</label>
					<input value="<?php echo $deptime; ?>" type="text" class="form-control" name="dept_time" placeholder="All times separated by space">
				</div>
				<div class="form-group">
					<label for="via-time">Destination time</label>
					<input value="<?php echo $destime; ?>" type="text" class="form-control" name="desti_time" placeholder="All times separated by space">
				</div>
				<div class="form-group">
					<label for="via-time">Total Km</label>
					<input value="<?php echo $totalkm; ?>" type="text" class="form-control" name="totalkm" placeholder="Total Km">
				</div>
				<div class="form-group">
					<label for="via-time">Total Fare</label>
					<input value="<?php echo $totalfa; ?>" type="text" class="form-control" name="total_fare" placeholder="Total Fare">
				</div>
				<div class="form-group">
					<label for="via-time">Seats</label>
					<input value="<?php echo $seats; ?>" type="text" class="form-control" name="seats" placeholder="Seats">
				</div>
				<div class="form-group">
					<label for="via-time">Bus Type</label>
					<select name = "bus_type" class="form-control">
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
							 	$bus_type1 = $row['bus_type'];
							 ?>
							 	<option value='<?php echo $bus_type_id; ?>'<?php if($category == $bus_type_id) echo "selected = selected"; ?>><?php echo $bus_type1; ?></option>
							 <?php } ?>
						
					</select>
					
				</div>

				

				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="update-bus" value="Update">
				</div><input type="hidden" name="edit_bus_id" value="<?php echo $edit_bus_id;?>" class="form-control">
			</form>
		</div>
	</div>
</div>
<?php include "includes/admin_footer.php"; ?>
