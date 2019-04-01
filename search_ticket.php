<?php include "includes/gsrtc_header.php"; ?>
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
          <h2 class="heading">Search Ticket</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
  	<div class="row mb-5">
        <div class="col-md-12">
  			<div class="block-32">
  				<!-- <div class="row"> -->
  					<form method="post" action="search_ticket_result.php">
		  				<div class="row">
		  					<label>Email:</label>
		  					<input type="email" name="em" class="form-control a1">
		  				</div>
		  				<br>
		  				<div class="row">
		  					<input type="submit" name="submit" class="btn btn-primary btn-block">
		  				</div>
		  			</form>
		  		<!-- </div> -->
		  	</div>
		  </div>
		</div>
	</div>
<?php include "includes/gsrtc_footer.php"; ?>