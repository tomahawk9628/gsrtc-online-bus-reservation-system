<?php include "includes/gsrtc_header.php"; ?>
<?php
  if (!isset($_POST['em'])) {
    # code...
    header("location: search_ticket.php");
  }
  $email = $_POST['em'];
  $query = "SELECT * FROM registration WHERE email = '$email'"; 
  $selectreg = mysqli_query($connection, $query);
  if (!$selectreg) {
    # code...
    die("Registration Query Failed");
  }
  $q1 = "SELECT * FROM timetable";
  $selecttime = mysqli_query($connection, $q1);
  if (!$selecttime) {
    # code...
    die("Timetable Query Failed");
  }
  $timetable = array();
  while ($row = mysqli_fetch_assoc($selecttime)) {
    # code...
    array_push($timetable, $row);
  }
  //print_r($timetable);
  $q2 = "SELECT * FROM citycode";
  $selectcity = mysqli_query($connection, $q2);
  if (!$selectcity) {
    # code...
    die("City Query Failed");
  }
  $city = array();
  while ($row = mysqli_fetch_assoc($selectcity)) {
    # code...
    array_push($city, $row);
  }
  //print_r($city);
?>
<?php
    if (isset($_POST['action1'])) {
       # code...
      if ($_POST['action1'] == "delete") {
        # code...
        $reg_pri = $_POST['reg_pri'];
        echo $reg_pri;
        $query = "DELETE FROM registration WHERE reg_pri = $reg_pri";
        $delticket = mysqli_query($connection, $query);
        if (!$delticket) {
          # code...
          die("Delete Query Failed");
        }
      }
     } 
  ?>
<script language="javascript">
  function deleteticket(reg_key) {
    if (confirm("Are you sure to cancel?")) {
      document.deltic.action1.value = "delete";
      document.deltic.reg_pri.value = reg_key;
      document.deltic.submit();
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
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
          <li class="nav-item active"><a href="search_ticket.php" class="nav-link">Search Ticket</a></li>
          <li class="nav-item "><a href="about.php" class="nav-link">About Us</a></li>
          <li class="nav-item"><a href="blog.php" class="nav-link">FAQs</a></li>
          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->

  <div class="block-30 block-30-sm item" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-10">
          <h2 class="heading">Search Result</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
  	<div class="row mb-5">
        <div class="col-md-12">
  			<div class="block-32">
  				<!-- <div class="row"> -->
            <form name="deltic" method="post">
            <div style="overflow: auto;">
    					<table class="table table-bordered table-hover">
                <thead>
                  <th>Sr. No</th>
                  <th>Reg Id</th>
                  <th>Name</th>
                  <th>Source</th>
                  <th>Destination</th>
                  <th>Time</th>
                  <th>Fare</th>
                  <th>Travel Date</th>
                  <th>Age</th>
                  <th>Email</th>
                  <!-- <th>Mobile</th> -->
                  <th>Gender</th>
                  <th>Seats</th>
                  <th>Cancel</th>
                </thead>
                <tbody>
                <?php
                  $count = 1;
                  while ($row = mysqli_fetch_assoc($selectreg)) {
                    # code...
                    foreach ($timetable as $tt) {
                      # code...
                      if ($tt['bus_id'] == $row['bus_id']) {
                        # code...
                        foreach ($city as $c) {
                          # code...
                          if ($c['city_code'] == $tt['ori_place_code']) {
                            # code...
                            $source = $c['city_name'];
                          }
                          elseif ($c['city_code'] == $tt['dest_place_code']) {
                            # code...
                            $destination = $c['city_name'];
                          }
                        }
                        $time = $tt['dept_time'];
                      }
                    }
                    $name = $row['name'];
                    $fare = $row['fare'];
                    $age = $row['age'];
                    $email = $row['email'];
                    $gen = $row['gender'];
                    $seats = $row['seats'];
                    $regid = $row['reg_id'];
                    $regpri = $row['reg_pri'];
                    $date = $row['travel_date'];
                ?>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $regid; ?></td>
                  <td><?php echo $name; ?></td>
                  <td><?php echo $source; ?></td>
                  <td><?php echo $destination; ?></td>
                  <td><?php echo $time; ?></td>
                  <td><?php echo $fare; ?></td>
                  <td><?php echo $date; ?></td>
                  <td><?php echo $age; ?></td>
                  <td><?php echo $email; ?></td>
                  <!-- <th>Mobile</th> -->
                  <td><?php echo $gen; ?></td>
                  <td><?php echo $seats; ?></td>
                  <?php
                    if ($date > date('Y-m-d')) {
                       # code... 
                  ?>
                  <td><a href="javascript: void(0);" onclick="javascript: deleteticket(<?php echo $regpri; ?>);">Cancel</a></td>
                <?php }
                      else{
                 ?>
                 <td>Cannot Cancel</td>
                 <?php } ?> 
                </tbody>
                <?php $count++; } ?>     
              </table>
            </div>
            <input type="hidden" name="action1">
            <input type="hidden" name="reg_pri">
          </form>
		  		<!-- </div> -->
		  	</div>
		  </div>
		</div>
	</div>
<?php include "includes/gsrtc_footer.php"; ?>