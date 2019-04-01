<?php include "includes/admin_header.php"; ?>
	<div id="wrapper">
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
	                    <h1 class="page-header">
	                        Welcome
	                        <small><?php echo $_SESSION['s_username']; ?></small>
	                        <!-- <small style="float:right"><a href="add_bus.php">+</a></small> -->
	                    </h1>
	                    <div style="overflow: auto;">
	                    <table class="table table-bordered table-hower">
	                    	<thead>
	                    		<th>Sr. No.</th>
	                    		<th>Reg. Id</th>
	                    		<th>Name</th>
	                    		<th>Source</th>
	                    		<th>Destination</th>
	                    		<th>Time</th>
	                    		<th>Fare</th>
	                    		<th>Age</th>
	                    		<th>Email</th>
	                    		<!-- <th>Mobile</th> -->
	                    		<th>Gender</th>
	                    		<th>Seats</th>
	                    		<th>Travel Date</th>
	                    	</thead>
	                    	<tbody>
	                    		<?php
	                    			$q1 = "SELECT * FROM timetable";
	                    			$get_time = mysqli_query($connection, $q1);
	                    			if (!$get_time) {
	                    			 	# code...
	                    			 	die("Timetable Query Failed");
	                    			}
	                    			$time = array();
	                    			while ($row1 = mysqli_fetch_assoc($get_time)) {
	                    			 	# code...
	                    			 	array_push($time, $row1);
	                    			}
	                    			$q2 = "SELECT * FROM citycode";
	                    			$get_city = mysqli_query($connection, $q2);
	                    			if (!$get_city) {
	                    			 	# code...
	                    			 	die("City Query Failed");
	                    			}
	                    			$city = array();
	                    			while ($row2 = mysqli_fetch_assoc($get_city)) {
	                    			 	# code...
	                    			 	array_push($city, $row2);
	                    			}
	                    			//print_r($city);
	                    			$query = "SELECT * FROM registration";
	                    			$get_reg = mysqli_query($connection, $query);
	                    			if (!$get_reg) {
	                    			 	# code...
	                    			 	die("Registration Query Failed");
	                    			}
	                    			while ($row = mysqli_fetch_assoc($get_reg)) {
	                    			 	# code...
	                    			 	foreach ($time as $t) {
	                    			 		# code...
	                    			 		if ($row['bus_id'] == $t['bus_id']) {
	                    			 			# code...
	                    			 			foreach ($city as $c) {
	                    			 				# code...
	                    			 				if ($t['ori_place_code'] == $c['city_code']) {
	                    			 					# code...
	                    			 					$source = $c['city_name'];
	                    			 				}
	                    			 				elseif ($t['dest_place_code'] == $c['city_code']) {
	                    			 					# code...
	                    			 					$destination = $c['city_name'];
	                    			 				}
	                    			 			}
	                    			 			$dept_time = $t['dept_time'];
	                    			 		}
	                    			 	}
	                    			 	$reg_pri = $row['reg_pri'];
                			 			$reg_id = $row['reg_id'];
                			 			$name = $row['name'];
                			 			$email = $row['email'];
                			 			$age = $row['age'];
                			 			$gen = $row['gender'];
                			 			$fare = $row['fare'];
                			 			$seats = $row['seats'];
                			 			$travel = $row['travel_date']; 
	                    		?>
	                    		<td><?php echo $reg_pri; ?></td>
	                    		<td><?php echo $reg_id; ?></td>
	                    		<td><?php echo $name; ?></td>
	                    		<td><?php echo $source; ?></td>
	                    		<td><?php echo $destination; ?></td>
	                    		<td><?php echo $dept_time; ?></td>
	                    		<td><?php echo $fare; ?></td>
	                    		<td><?php echo $age; ?></td>
	                    		<td><?php echo $email; ?></td>
	                    		<!-- <th>Mobile</th> -->
	                    		<td><?php echo $gen; ?></td>
	                    		<td><?php echo $seats; ?></td>
	                    		<td><?php echo $travel; ?></td>
	                    	</tbody>
	                    <?php } ?>
	                    </table>
	                </div>
	                 </div>      
				</div>
			</div>
		</div>
	</div>
<?php include "includes/admin_footer.php"; ?>