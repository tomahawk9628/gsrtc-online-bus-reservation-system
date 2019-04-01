<?php include"includes/admin_header.php"; ?>

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
                        <br><br>
                        <h2>REPORT:</h2>
                        <br>
                        <?php

                        $curr_date = date('Y-m-d');
                        $query = "SELECT *  FROM  timetable";
                        $bus_count_total = mysqli_query($connection,$query);
                        $total_buses_provided = mysqli_num_rows($bus_count_total);

                        $query = "SELECT * FROM user";
                        $get_admin = mysqli_query($connection,$query);
                        $total_admin = mysqli_num_rows($get_admin);

                        $query = "SELECT * FROM feedback";
                        $get_feedback = mysqli_query($connection,$query);
                        $total_feedback = mysqli_num_rows($get_feedback);

                        $query = "SELECT * FROM bustype";
                        $get_bus_type = mysqli_query($connection,$query);
                        $total_bus_type = mysqli_num_rows($get_bus_type);

                        $query = "SELECT * FROM faq";
                        $get_faq = mysqli_query($connection, $query);
                        $total_faq = mysqli_num_rows($get_faq);

                        $query = "SELECT * FROM citycode";
                        $get_cities = mysqli_query($connection, $query);
                        $total_cities = mysqli_num_rows($get_cities);

                        $query = "SELECT * FROM registration";
                        $get_reg = mysqli_query($connection,$query);
                        $total_reg = mysqli_num_rows($get_reg);
                        ?>



                        <table class="table table-striped" style="width: 50%">
                          <tbody>
                            <tr>
                              <td><b>Total Buses Provided:</b> </td>
                              <td><?php echo $total_buses_provided; ?></td>
                            </tr>
                            <tr>
                              <td><b>Total Bus Types:</b> </td>
                              <td><?php echo $total_bus_type; ?></td>
                            </tr>
                            <tr>
                              <td><b>Total Registrations: </b></td>
                              <td><?php echo $total_reg; ?></td>
                            </tr>
                            <tr>
                              <td><b>Total Admins: </b></td>
                              <td><?php echo $total_admin; ?></td>
                            </tr>
                            <tr>
                              <td><b>Total FAQs: </b></td>
                              <td><?php echo $total_faq; ?></td>
                            </tr>
                            <tr>
                              <td><b>Total Cities: </b></td>
                              <td><?php echo $total_cities; ?></td>
                            </tr>
                            <tr>
                              <td><b>Total Feedback: </b></td>
                              <td><?php echo $total_feedback; ?></td>
                            </tr>
                          </tbody>
                        </table>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include"includes/admin_footer.php"; ?>