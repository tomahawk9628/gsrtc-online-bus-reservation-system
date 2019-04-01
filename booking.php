<?php include "includes/gsrtc_header.php"; ?>
<?php
  if (!isset($_POST['seats'])) {
    # code...
    header("location: index.php");
  }
  $_SESSION['seats'] = $_POST['seats'];
  $_SESSION['bid'] = $_POST['bid'];
?>
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
        	<div class ="block-32">
        		<form method="post" action="confirm.php">
        			<div class="row">
        				<label>Name</label>
						<input class="form-control a1" type="text" name="name" autocomplete="off" placeholder="Enter Your Name Here" required>
					</div>
						
        			<div class="row">
        				<label>Email</label>
						<input class="form-control a1" type="email" placeholder="Your Email Here" name="email" autocomplete="off" required>
						
					</div>
        			<div class="row">
        				<label>Age</label>
        				<input type="number" name="age" placeholder="Enter Your Age.." required class="form-control a1" autocomplete="off">
        			</div>
        			<div class="row">
        				<label>Gender</label>
        				<select class="form-control a1" name="gen">
        					<option value="male">Male</option>
        					<option value="female">Female</option>
        					<option value="other">Other</option>
        				</select>
        			</div>
        			<br>
        			<div class="row">
        				<button class="btn btn-primary btn-block" type="submit" value="submit">Submit</button>
        			</div>
        		</form>
        	</div>
        </div>
    </div>
</div>
<?php include "includes/gsrtc_footer.php"; ?>