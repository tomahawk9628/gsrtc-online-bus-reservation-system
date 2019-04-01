<?php include "includes/gsrtc_header.php"; ?>
<?php
//echo "<pre>";
//print_r($_POST);
	if (!isset($_POST['source'])) {
		# code...
		header("location: index.php");
	}
	$source = $_POST['source'];
	$destination = $_POST['destination'];
	$seats = $_POST['seats'];
	$travel = $_POST['datep'];
	$_SESSION['date'] = $_POST['datep'];
	//print_r($city);
	// $query = "SELECT T.*,sum(seats) as occupied FROM timetable AS T LEFT JOIN registration AS R ON (T.bus_id=R.bus_id) WHERE ori_place_code = $source AND dest_place_code = $destination";
	$query = "SELECT * FROM timetable WHERE ori_place_code = $source AND dest_place_code = $destination";
	$selecttime = mysqli_query($connection, $query);
	if (!$selecttime) {
	 	# code...
	 	die("Query Failed");
	 }
?>
	<script language="javascript">
		function searchf(bus_id) {

			
			document.searchs.seats.value = <?php echo $seats; ?>;
			document.searchs.bid.value = bus_id;
			document.searchs.action = "booking.php";
			document.searchs.submit();
		}
	</script>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">Gsrtc</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
          <li class="nav-item"><a href="search_ticket.php" class="nav-link">Search Ticket</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li>
          <li class="nav-item"><a href="blog.php" class="nav-link">FAQs</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->
  
  <div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
      <div class="block-30 item" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      
      </div>
      <div class="block-30 item" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        
      </div>
      <div class="block-30 item" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
       
      </div>
    </div>
  </div>
 <div class="container">
 	<div class="row mb-5">
      <div class="col-md-12">
          <div class="block-32" style="overflow: auto;">
          	<?php
          		if(mysqli_num_rows($selecttime) == 0){
          			echo "No Data Found";
          		}
          		else{ 
          	?>
          			<form action="" method="post" name="searchs">
					<table class="table table-bordered table-hover">
						<tr>
							<th>Source</th>
							<th>Destination</th>
							<th>Departure Time</th>
							<th>Destination Time</th>
							<th>Total Kilometers</th>
							<th>Total Fare</th>
							<th>Bus Type</th>
							<th>Available Seats</th>
						</tr>
						<?php
							$q3 = "SELECT * FROM seats";
							$selectseat = mysqli_query($connection, $q3);
							if (!$selectseat) {
								# code...
								die("Query Failed");
							}
							else {
								$seat = array();
								while ($row = mysqli_fetch_assoc($selectseat)) {
									# code...
									array_push($seat, $row);
								}
							}
							//print_r($seat);
							$q2 = "SELECT * FROM bustype";
							$selectbus = mysqli_query($connection, $q2);
							if (!$selectbus) {
								# code...
								die("Query Failed");
							}
							else {
								$bust = array();
								while ($row = mysqli_fetch_assoc($selectbus)) {
									# code...
									array_push($bust, $row);
								}
							}
							$q1 = "SELECT * FROM citycode";
							$selectcity = mysqli_query($connection, $q1);
							if (!$selectcity) {
							# code...
							die("Query Failed");
							}
							else{
								$city = array();
								while ($row = mysqli_fetch_assoc($selectcity)) {
									# code...
									array_push($city, $row);
								}
							}
							//print_r($city);
							while ($row = mysqli_fetch_assoc($selecttime)) {
						 		# code...

						 		$bus_type = $row['bus_type'];
						 		$busid = $row['bus_id'];
						 		$q1 = "SELECT sum(seats)'sum1' FROM registration WHERE travel_date = '$travel' AND bus_id = $busid";
						 		$selectreg = mysqli_query($connection, $q1);
						 		if (!$selectreg) {
						 			# code...
						 			die("Registration Query Failed");
						 		}
						 		while ($row1 = mysqli_fetch_assoc($selectreg)) {
						 			# code...
						 			$seat2 = $row1['sum1'];
						 		}
						 		foreach ($city as $c) {
						 			# code...
						 			if ($c['city_code'] == $source) {
						 				# code...
						 				$source1 = $c['city_name'];
						 			}
						 			elseif ($c['city_code'] == $destination) {
						 				# code...
						 				$destination1 = $c['city_name'];
						 			}
						 		}
						 		foreach ($bust as $b) {
						 			# code...
						 			if ($b['bus_type_id'] == $bus_type) {
						 				# code...
						 				$bustype = $b['bus_type'];
						 			}
						 		}
						 		//$source = $row['ori_place_code'];
						 		//$destination = $row['dest_place_code'];
						 		$dept_time = $row['dept_time'];
						 		$desti_time = $row['desti_time'];
						 		$totalkm = $row['totalkm'];
						 		$total_fare = $row['total_fare'];
						 		$avs = $row['seats']-$seat2;
						 		//$avs = 0;
						 		//$bus_type = $row['bus_type'];
						?>
						<tr>
							<td><?php echo $source1; ?></td>
							<td><?php echo $destination1; ?></td>
							<td><?php echo $dept_time; ?></td>
							<td><?php echo $desti_time; ?></td>
							<td><?php echo $totalkm; ?></td>
							<td><?php echo $total_fare; ?></td>
							<td><?php echo $bustype; ?></td>
							<?php
								if ($avs < 1) {
								  	# code...
								  	echo "<td>No Seats Available</td>";
								  }
								else {
									echo "<td><a href='javascript:void(0);' onclick='javascript:searchf({$busid});'><button class = 'button2'><span>$avs</span></button></a></td>";
								}  
							?>	
						</tr>
					<?php } ?>
					</table>
					<input type="hidden" name="seats">
					<input type="hidden" name="bid">
				</form>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php include "includes/gsrtc_footer.php"; ?>