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
          <li class="nav-item"><a href="search_ticket.php" class="nav-link">Search Ticket</a></li>
          <li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li>
          <li class="nav-item active"><a href="blog.php" class="nav-link">FAQs</a></li>
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
          <span class="subheading-sm">FAQs</span>
              <h2 class="heading">Frequently Asked Questions</h2>
        </div>
      </div>
    </div>
  </div>


  <div class=" site-section bg-light" id="blog">
    <div class="col-md-12 mb-4"> 
      <div class="block-3d-md-flex">
        <div class="text">
         <h2 style="margin-left: 10%;">FAQs</h2>
<p style="margin-left: 10%;">Click on the buttons to open the collapsible content.</p>

<?php
    $query = "SELECT * FROM faq";
    $selectfaq = mysqli_query($connection, $query);
    if (!$selectfaq) {
      # code...
      die(mysqli_error($selectfaq));
    }
    else {
      while ($row = mysqli_fetch_assoc($selectfaq)) {
        # code...
        $faqque = $row['faq_que'];
        $faqans = $row['faq_ans'];
?>

<button class="accordion"><?php echo $faqque; ?></button>
<div class="panel">
  <p><?php echo $faqans; ?></p>
</div>
<?php } } ?>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active2");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>

        </div>
      </div>
    </div>
 
      </div>

      <div class="row mt-5">
                <div class="col-md-12 pt-5">
                  <ul class="pagination custom-pagination">
                    <li class="page-item prev"><a class="page-link" href="#"><i class="icon-keyboard_arrow_left"></i></a></li>
                    <li class="page-item active"><a class="page-linkx href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item next"><a class="page-link" href="#"><i class="icon-keyboard_arrow_right"></i></a></li>
                  </ul>


                </div>
              </div>
  </div>
  </div>
  
  <?php include "includes/gsrtc_footer.php"; ?>