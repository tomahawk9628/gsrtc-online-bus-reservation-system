<?php include "includes/gsrtc_header.php"; ?>
<?php
  if (!isset($_SESSION['name'])) {
    # code...
    header("location: index.php");
  }
	$name = $_SESSION['name'];
  $regid = $_SESSION['regid'];
	// $source = $_SESSION['source'];
	// $destination = $_SESSION['destination'];
	$busid = $_SESSION['bid'];
  $q1 = "SELECT * FROM registration WHERE reg_id = $regid";
  $getreg = mysqli_query($connection, $q1);
  if (!$getreg) {
    # code...
    die("Registration Query Failed");
  }
  while ($row = mysqli_fetch_assoc($getreg)) {
    # code...
    $date = $row['travel_date'];
    $seats = $row['seats'];
  }
  $q2 = "SELECT sum(seats)'sum1' FROM registration WHERE travel_date = '$date' AND bus_id = $busid";
  $getsum = mysqli_query($connection, $q2);
  if (!$getsum) {
    # code...
    die("Sum Query Failed");
  }
  while ($row = mysqli_fetch_assoc($getsum)) {
    # code...
    $sum = $row['sum1'];
  }
	$query = "SELECT * FROM timetable WHERE bus_id = $busid";
	$get_time = mysqli_query($connection, $query);
	if (!$get_time) {
		# code...
		die("Timetable Query Failed");
	}
	$q1 = "SELECT * FROM citycode";
	$get_city = mysqli_query($connection, $q1);
	if (!$get_city) {
		# code...
		die("City Query Failed");
	}
	$city = array();
	while ($row = mysqli_fetch_assoc($get_city)) {
		# code...
		array_push($city, $row);
	}
	while ($row = mysqli_fetch_assoc($get_time)) {
		# code...
		foreach ($city as $c) {
			# code...
			if ($row['ori_place_code'] == $c['city_code']) {
				# code...
				$source = $c['city_name'];
			}
			elseif ($row['dest_place_code'] == $c['city_code']) {
				# code...
				$destination = $c['city_name'];
			}
		}
		$time = $row['dept_time'];
	}
?>
<script language="javascript">
	
		function printticket(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			// document.body.innerHTML = originalContents;
			window.location.assign("result.php");
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
  
  
      <div class="block-30 item" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      
      </div>
      
  <div>
  <div id="printMe">
	<div class="main-content">
  	<div class="ticket">
    <div class="ticket__main">
      <div class="header">GSRTC</div>
      <div class="info passenger">
        <div class="info__item">Passenger</div>
        <div class="info__detail">
        <?php echo $name; ?> </div>
      </div>
      <div class="info platform"> <span>Depart </span><span>from </span><span>platform</span>
        <div class="number">
          <div>9</div>
          <div> <span></span><span></span></div>
        </div>
      </div>
      <div class="info departure">
        <div class="info__item">Source</div>
        <div class="info__detail"><?php echo $source; ?></div>
      </div>
      <div class="info arrival">
        <div class="info__item">Destination</div>
        <div class="info__detail"><?php echo $destination; ?></div>
      </div>
      <div class="info date">
        <div class="info__item">Date</div>
        <div class="info__detail"><?php $dateArray=explode("-", $date); echo $dateArray[2]."-".$dateArray[1]."-".$dateArray[0]; ?></div>
      </div>
      <div class="info time">
        <div class="info__item">Time</div>
        <div class="info__detail"><?php echo $time; ?></div>
      </div>
     
      <?php
        $c = 0;
        $total = $sum - $seats;
        $c = $c + $total;
        $c++;
        for ($i=0; $i < $seats; $i++) { 
          # code...
      ?>
      <div class="info seat">
        <div class="info__item">Seat</div>
        <div class="info__detail"><?php echo $c; ?></div>
      </div>
      <?php $c++; } ?> 
      <div class="fineprint"> 
        <p>Boarding begins 30 minutes before departure.</p>
        <p>This ticket is Non-refundable • Gujarat State Road Transport Corporation</p>
      </div>
      <div class="snack">
        <svg viewBox="0 0 512 512">
        	<path xmlns="http://www.w3.org/2000/svg" d="M488 128h-8V80c0-44.8-99.2-80-224-80S32 35.2 32 80v48h-8c-13.25 0-24 10.74-24 24v80c0 13.25 10.75 24 24 24h8v160c0 17.67 14.33 32 32 32v32c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32v-32h192v32c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32v-32h6.4c16 0 25.6-12.8 25.6-25.6V256h8c13.25 0 24-10.75 24-24v-80c0-13.26-10.75-24-24-24zM112 400c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm16-112c-17.67 0-32-14.33-32-32V128c0-17.67 14.33-32 32-32h256c17.67 0 32 14.33 32 32v128c0 17.67-14.33 32-32 32H128zm272 112c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"/></path>
          
        </svg>
        
      </div>
      
    </div>
    <div class="ticket__side">
      <div class="logo"> 
        <p>GSRTC</p>
      </div>
      <div class="info side-arrive">
        <div class="info__item">Destination</div>
        <div class="info__detail"><?php echo $destination; ?></div>
      </div>
      <div class="info side-depart">
        <div class="info__item">Source</div>
        <div class="info__detail"><?php echo $source; ?></div>
      </div>
      <div class="info side-date">
        <div class="info__item">Date</div>
        <div class="info__detail"><?php echo $date; ?></div>
      </div>
      <div class="info side-time">
        <div class="info__item">Time</div>
        <div class="info__detail"><?php echo $time; ?></div>
      </div>
      
    </div>
  </div>
</div>
</div>
</div>
<br><br>
	<a href="javascript: void(0);"onclick="javascript: printticket('printMe');">Print</a>
<br><br>
<?php include "includes/gsrtc_footer.php"; ?>