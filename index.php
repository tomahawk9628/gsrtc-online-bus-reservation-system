<?php
  if (isset($_SESSION)) {
     # code...
    session_unset();
    session_destroy();
   } 
?>
<?php include "includes/gsrtc_header.php"; ?>
<script>
  $(function() {
    var at = ["Ahemdabad", "Bhavnagar"];
    $("#tags").autocomplete({
      source: at
    });
  });
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

          <div class="block-32">
            <form method="post" action="search.php">
              <div class="row">
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label for="checkin">From</label>
                  <select name="source" class="form-control">
                      <?php
                        $query = "SELECT * FROM citycode";
                        $selectcity = mysqli_query($connection, $query);
                        if (!$selectcity) {
                           # code...
                          die("Query Failed");
                         }
                         else {
                          while ($row = mysqli_fetch_assoc($selectcity)) {
                            # code...
                            $city_code = $row['city_code'];
                            $city_name = $row['city_name'];
                      ?>
                      <option value="<?php echo $city_code; ?>"><?php echo $city_name; ?></option>
                    <?php } } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label for="checkin">To</label>
                   
                   <select name="destination" class="form-control">
                      <?php
                        $query = "SELECT * FROM citycode";
                        $selectcity = mysqli_query($connection, $query);
                        if (!$selectcity) {
                           # code...
                          die("Query Failed");
                         }
                         else {
                          while ($row = mysqli_fetch_assoc($selectcity)) {
                            # code...
                            $city_code = $row['city_code'];
                            $city_name = $row['city_name'];
                      ?>
                      <option value="<?php echo $city_code; ?>"><?php echo $city_name; ?></option>
                    <?php } } ?>
                    </select>
                </div>
                <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                  <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label for="checkin">Seats</label>
                        <select name="seats" class="form-control">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                      <?php
                        $datem = date('Y-m-d');
                        $date2 = date('Y-m-d', mktime(0,0,0,date('m'),date('d')+5,date('Y')));
                      ?>
                      <label for="checkin">Date</label>
                    <input type="date" name="datep" class="form-control" style="width: auto;" max="<?php echo $date2; ?>" min = "<?php echo $datem; ?>" required>
                </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3 align-self-end" style=" width:175px;">
                  <button class="btn btn-primary btn-block" name = "search" style="width: 150px; margin-left: 70px;">Search</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="container">
      <div class="row site-section">
        <div class="col-md-12">
          <div class="row mb-5">
            <div class="col-md-7 section-heading">
              <span class="subheading-sm">Services</span>
              <h2 class="heading">Facilities &amp; Services</h2>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            <div class="icon"><span class="flaticon-double-bed"></span></div>
            <div class="media-body">
              <h3 class="heading">Luxury Buses</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>      
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            <div class="icon"><span class="flaticon-wifi"></span></div>
            <div class="media-body">
              <h3 class="heading">Fast &amp; Free Wifi</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            <div class="icon"><span class="flaticon-customer-service"></span></div>
            <div class="media-body">
              <h3 class="heading">Call Us 24/7</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>
        </div>
      </div>

       
        <div class="col-md-6 col-lg-4">
          <div class="media block-6">
            <div class="icon"><span class="flaticon-credit-card"></span></div>
            <div class="media-body">
              <h3 class="heading">Accepts Credit Card</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>
        </div>
       

      </div>
    </div>

  
    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
            <div class="col-md-7 section-heading">
              <span class="subheading-sm">Categories</span>
              <h2 class="heading">Bus Categories</h2>
            </div>
          </div>

        <div class="block-35">
          
          <ul class="nav" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Buses</a>
            </li>
          
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="row">
                <div class="col-md-12 block-13">
                  <div class="nonloop-block-13 owl-carousel">
                    <div class="item">
                      <div class="block-34">
                        <div class="image">
                          <a href="#"><img src="images/menu_1.jpg" alt="Image placeholder"></a>
                        </div>
                        <div class="text">
                          <h2 class="heading">Express</h2>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione quo vel aut ab qui quas!</p>
                          <div class="price"><sup>Rs.</sup><span class="number">30.50</span></div>
                        </div>
                      </div>
                    </div>

                    <div class="item">
                      <div class="block-34">
                        <div class="image">
                          <a href="#"><img src="images/menu_2.jpg" alt="Image placeholder"></a>
                        </div>
                        <div class="text">
                          <h2 class="heading">Gurjarnagari</h2>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione quo vel aut ab qui quas!</p>
                          <div class="price"><sup>Rs.</sup><span class="number">40.45</span></div>
                        </div>
                      </div>
                    </div>

                    <div class="item">
                      <div class="block-34">
                        <div class="image">
                          <a href="#"><img src="images/menu_3.jpg" alt="Image placeholder"></a>
                        </div>
                        <div class="text">
                          <h2 class="heading">Luxury</h2>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione quo vel aut ab qui quas!</p>
                          <div class="price"><sup>Rs.</sup><span class="number">45.50</span></div>
                        </div>
                      </div>
                    </div>

                    <div class="item">
                      <div class="block-34">
                        <div class="image">
                          <a href="#"><img src="images/menu_4.jpg" alt="Image placeholder"></a>
                        </div>
                        <div class="text">
                          <h2 class="heading">Mini Bus</h2>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione quo vel aut ab qui quas!</p>
                          <div class="price"><sup>Rs.</sup><span class="number">30.45</span></div>
                        </div>
                      </div>
                    </div>

                   
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="block-30 block-30-sm item" style="background-image: url('images/bg_2.jpg'); overflow: auto;" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-12">
              <h2 class="heading">Quality accommodation that exceeds the expectations</h2>
             
            </div>
          </div>
        </div>
      </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-7 section-heading">
            <span class="subheading-sm">Reviews</span>
            <h2 class="heading">Guest Reviews</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">

            <div class="block-33">
              <div class="vcard d-flex mb-3">
                <div class="image align-self-center"><img src="images/person_3.jpg" alt="Person here"></div>
                <div class="name-text align-self-center">
                  <h2 class="heading">Markand bhai</h2>
                  <span class="meta">Satisfied Customer</span>
                </div>
              </div>
              <div class="text">
                <blockquote>
                  <p>&rdquo; this is very nice service and very very nice service.service is very good.amne bavaj maja aavi and service is so good and bla  bla bla tis and those.what is this fafda ni dish. &ldquo;</p>
                </blockquote>
              </div>
            </div>

          </div>
          <div class="col-md-6 col-lg-4">

            <div class="block-33">
              <div class="vcard d-flex mb-3">
                <div class="image align-self-center"><img src="images/person_2.jpg" alt="Person here"></div>
                <div class="name-text align-self-center">
                  <h2 class="heading">Ninaben parekh</h2>
                  <span class="meta">Satisfied Customer</span>
                </div>
              </div>
              <div class="text">
                <blockquote>
                  <p>&rdquo; Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquid. Atque dolore esse veritatis iusto eaque perferendis non dolorem fugiat voluptatibus vitae error ad itaque inventore accusantium tempore dolores sunt. &ldquo;</p>
                </blockquote>
              </div>
            </div>

          </div>
          <div class="col-md-6 col-lg-4">

            <div class="block-33">
              <div class="vcard d-flex mb-3">
                <div class="image align-self-center"><img src="images/person_1.jpg" alt="Person here"></div>
                <div class="name-text align-self-center">
                  <h2 class="heading">Elaben khakhrawala</h2>
                  <span class="meta">Satisfied Customer</span>
                </div>
              </div>
              <div class="text">
                <blockquote>
                  <p>&rdquo; Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga aliquid. Atque dolore esse veritatis iusto eaque perferendis non dolorem fugiat voluptatibus vitae error ad itaque inventore accusantium tempore dolores sunt. &ldquo;</p>
                </blockquote>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <?php include "includes/gsrtc_footer.php"; ?>