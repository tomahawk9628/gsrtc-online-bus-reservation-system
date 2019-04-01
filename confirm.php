<?php include "includes/gsrtc_header.php"; ?>
<?php
  //error_reporting(0);
  //print_r($_POST);
  if (!isset($_POST['name'])) {
    # code...
    header("location: index.php");
  }
	$name = mysqli_real_escape_string($connection,$_POST['name']);
	$email = mysqli_real_escape_string($connection,$_POST['email']);
	$age = mysqli_real_escape_string($connection,$_POST['age']);
	$gen = $_POST['gen'];
	$busid = $_SESSION['bid'];
	$seats = $_SESSION['seats'];
  $date = $_SESSION['date'];
	$query = "SELECT * FROM timetable WHERE bus_id = $busid";
	$selecttime = mysqli_query($connection, $query);
	if (!$selecttime) {
		# code...
		die("Query Failed");
	}
	else {
		$q1 = "SELECT * FROM citycode";
		$selectcity = mysqli_query($connection, $q1);
		if (!$selectcity) {
			# code...
			die("Query Failed");
		}
		else {
			$city = array();
			while ($row = mysqli_fetch_assoc($selectcity)) {
				# code...
				array_push($city, $row);
			}
		}
		while ($row = mysqli_fetch_assoc($selecttime)) {
			# code...
			foreach ($city as $c) {
				# code...
				if ($c['city_code'] == $row['ori_place_code']) {
					# code...
					$source = $c['city_name'];
				}
				elseif ($c['city_code'] == $row['dest_place_code']) {
					# code...
					$dest = $c['city_name'];
				}
			}
			$tof = $row['total_fare'];
		}
	}
?>
<?php
  $tt = $tof*$seats; 
?>
	<script language="javascript">
		function confirmpay()
		{
			if (confirm("Are You Sure?")) {
        <?php
          $_SESSION['name'] = $name;
          $_SESSION['email']= $email;
          $_SESSION['age'] = $age;
          $_SESSION['gen'] = $gen;
          $_SESSION['fare'] = $tt;
          /*$_SESSION['bid'] = $busid;
          $_SESSION['seats'] = $seats;*/
        ?>
        document.location = "payment_confirm.php";
			}
			else {
				//document.loacation = "index.php";
			}
		}

		function confirmres()
		{
			if (confirm("Are You Sure?")) {
				document.location = "index.php";
			}
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
          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
          <!-- <li class="nav-item"><a href="rooms.php" class="nav-link">Rooms</a></li> -->
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
          <div class="block-32">
          	<table class="table table-bordered table-hover">
          		<tr>
          			<th>Name</th>
          			<td><?php echo $name; ?></td>
          		</tr>
          		<tr>
          			<th>Age</th>
          			<td><?php echo $age; ?></td>
          		</tr>
          		<tr>
          			<th>Gender</th>
          			<td><?php echo $gen; ?></td>
          		</tr>
          		<tr>
          			<th>Source</th>
          			<td><?php echo $source; ?></td>
          		</tr>
          		<tr>
          			<th>Destination</th>
          			<td><?php echo $dest; ?></td>
          		</tr>
          		<tr>
          			<th>Seats</th>
          			<td><?php echo $seats; ?></td>
          		</tr>
          		<tr>
          			<th>Email</th>
          			<td><?php echo $email; ?></td>
          		</tr>
          		<!-- <tr>
          			<th>MobileNo.</th>
          			<td></td>
          		</tr> -->
          		<tr>
          			<th>Total Fare</th>
          			<td><?php echo $tt; ?></td>
          		</tr>	
              <tr>
                <th>Date</th>
                <td><?php echo $date; ?></td>
              </tr> 	
          	</table>
        				<button type="submit" value="submit" class="btn btn-primary" onclick="javascript: confirmpay();">Confirm</button>
        				<button type="submit" value="submit" class="btn btn-primary"style="padding-left:2%;padding-right: 2%" onclick="javascript: confirmres();">Reset</button>
          </div>
      </div>
    </div>
</div>
<?php include "includes/gsrtc_footer.php"; ?>