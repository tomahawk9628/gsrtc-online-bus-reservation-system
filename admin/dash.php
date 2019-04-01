<?php include"includes/admin_header.php"; ?>

<?php
    $query = "SELECT * FROM registration";
    $getreg = mysqli_query($connection, $query);
    if (!$getreg) {
         # code...
        die("Registration Query Failed");
     } 
    $totalticket = mysqli_num_rows($getreg);
    $q1 = "SELECT * FROM registration WHERE WEEK(CURDATE()) = WEEK(travel_date)";
    $weekreg = mysqli_query($connection, $q1);
    if (!$weekreg) {
        # code...
        die("Week Query Failed");
    }
    $total_week = mysqli_num_rows($weekreg);
    $q2 = "SELECT SUM(fare)'total' FROM registration";
    $getsum = mysqli_query($connection, $q2);
    if (!$getsum) {
        # code...
        die("Sum Failed");
    }
    while ($row = mysqli_fetch_assoc($getsum)) {
        # code...
        $total_sum = $row['total'];
    }
?>
    <div id="wrapper">
        
        <!-- Navigation -->
        <?php include"includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome 
                            <small><?php echo ucfirst($_SESSION['s_username']);   ?></small>
                        </h1>
                        <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number"><?php echo $totalticket; ?></h2>
                                <span class="desc">tickets sold</span>
                                <div class="icon">
                                    <i class="fal fa-ticket-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number"><?php echo $total_week; ?></h2>
                                <span class="desc">this week</span>
                                <div class="icon">
                                    <i class="fal fa-calendar-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">Rs. <?php echo $total_sum; ?></h2>
                                <span class="desc">total earnings</span>
                                <div class="icon">
                                    <i class="fal fa-sack-dollar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container">
                <center><h3>Per Day Statistics</h3></center>
                <div style="overflow: auto;">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Bus Id</th>
                                <th>Source</th>
                                <th>Destination</th>
                                <th>Time</th>
                                <th>Booked Seats</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM citycode";
                                $getcity = mysqli_query($connection, $query);
                                if (!$getcity) {
                                    # code...
                                    die("City Query Failed");
                                }
                                $city = array();
                                while ($row = mysqli_fetch_assoc($getcity)) {
                                     # code...
                                    array_push($city, $row);
                                 }
                                $query = "SELECT * FROM timetable";
                                $gettime = mysqli_query($connection, $query);
                                if (!$gettime) {
                                      # code...
                                    die("Timetable Query Failed");
                                  }
                                while ($row = mysqli_fetch_assoc($gettime)) {
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
                                        $busid = $row['bus_id'];
                                        $time = $row['dept_time'];
                                        $curdate = date('Y-m-d');
                                        $q1 = "SELECT SUM(seats)'total' FROM registration WHERE travel_date = '$curdate' AND bus_id = $busid";
                                        //echo $q1;
                                        $getreg = mysqli_query($connection, $q1);
                                        if (!$getreg) {
                                              # code...
                                            die("Reg Query Failed");
                                          }
                                        while ($row1 = mysqli_fetch_assoc($getreg)) {
                                            # code...
                                            $tw = $row1['total'];
                                            // print_r($row1);
                                            if ($tw <= 0) {
                                                # code...
                                                $tw = 0;
                                            }
                                        }
                                        //$tw = 46;
                                        //$time = $row['dept_time'];    
                            ?>
                            <tr <?php if ($tw > 45) {
                                # code...
                                echo "class = 'danger'";
                            } ?>>
                                <td><?php echo $busid; ?></td>
                                <td><?php echo $source; ?></td>
                                <td><?php echo $destination; ?></td>
                                <td><?php echo $time ?></td>
                                <td><?php echo $tw; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>                
            </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include"includes/admin_footer.php"; ?>