<?php include"includes/admin_header.php";
?>

<?php
 ?>
 <script type="text/javascript">
     function deleteBus(bus_id)
     {
        if(confirm("Are you sure?"))
        {
            document.frmbus.busid.value = bus_id;
            document.frmbus.action1.value = "Delete";
            document.frmbus.submit();
        }
     }
     function updateBus(bus_id)
     {
        document.frmbus.busid.value = bus_id;
        document.frmbus.action1.value = "Update";
        document.frmbus.action = "update.php";
        document.frmbus.submit();
     }
 </script>     
    <div id="wrapper">
        
        <!-- Navigation -->
        <?php //include"includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12" style="overflow: auto;">
                        <h1 class="page-header">
                            Welcome
                            <small><?php echo $_SESSION['s_username']; ?></small>
                            <small style="float:right"><a href="add_bus.php">+</a></small>
                        </h1>                        
                        <?php 

                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }
                        else {
                            $source = "";
                        }

                        switch ($source) {

                            default: ?>
                            <div style="overflow: auto;">
                            <form action="" method="post" name="frmbus">
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>Bus_Id</th>
                                        <th>Source</th>
                                        <th>Destination</th>
                                        <th>Intermediate Stations</th>
                                        <th>Category</th>
                                        <th>Departure Time</th>
                                        <th>Destination Time</th>
                                        <th>Total km</th>
                                        <th>Total Fare</th>
                                        <th>Seats</th>
                                        <th>Delete</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    <?php
                                        $q3 = "SELECT * FROM intermediate";
                                        $select_int = mysqli_query($connection,$q3);
                                        $intcity = array();
                                        while($row = mysqli_fetch_assoc($select_int)) {
                                            array_push($intcity,$row);
                                        }
                                        //print_r($intcity);
                                        $q = "SELECT * FROM citycode";
                                        $select_city = mysqli_query($connection,$q);
                                        $city = array();
                                        while($row = mysqli_fetch_assoc($select_city)) {
                                            array_push($city,$row);
                                        }
                                        // print_r($city);
                                        $q2 = "SELECT * FROM bustype";
                                        $selectbus = mysqli_query($connection, $q2);
                                        $bus = array();
                                        while($row = mysqli_fetch_assoc($selectbus)) {
                                            array_push($bus, $row);
                                        }
                                        //print_r($bus);
                                        $query = "SELECT * FROM  timetable";
                                        $select_posts = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_posts)) {
                                            $bus_id = $row['bus_id'];
                                            
                                            foreach ($city as $c) {
                                                if($c['city_code'] == $row['ori_place_code']){
                                                         $source = $c['city_name'];
                                                        
                                                }
                                                if($c['city_code'] == $row['dest_place_code']){
                                                        $destination = $c['city_name'];
                                                }
                                            }
                                            foreach ($bus as $b) {
                                                # code...
                                                if ($b['bus_type_id'] == $row['bus_type']) {
                                                    # code...
                                                    $category = $b['bus_type'];
                                                    //echo $category;
                                                }
                                            }
                                            foreach ($intcity as $i) {
                                                # code...
                                                if ($i['bus_id'] == $row['bus_id']) {
                                                    # code...
                                                    foreach ($city as $c) {
                                                        # code...
                                                        if ($i['city_code'] == $c['city_code']) {
                                                            # code...
                                                            $intermediate_station = $c['city_name'];
                                                        }
                                                    }
                                                }
                                            }
                                            
                                            $depttime = $row['dept_time'];
                                            $destime = $row['desti_time'];
                                            $totalkm = $row['totalkm'];
                                            $totalfa = $row['total_fare'];
                                            $seats = $row['seats'];
                                        
                                        if ($source!==0) {
                                            # code...
                                        

                                     ?>
                                    <tr>
                                        <td><?php echo $bus_id ?></td>
                                        <td><?php echo $source ?></td>
                                        <td><?php echo $destination; ?></td>
                                        <td><?php echo $intermediate_station ?></td>
                                        <td><?php echo $category ?></td>
                                        <td><?php echo $depttime ?></td>
                                        <td><?php echo $destime ?></td>
                                        <td><?php echo $totalkm ?></td>
                                        <td><?php echo $totalfa ?></td>
                                        <td><?php echo $seats; ?></td>
                                        <?php echo "<td><a class='btn btn-danger' href='javascript:void(0);' onclick = 'javascript:deleteBus({$bus_id});'><i class='fal fa-trash-alt'></i> Delete</a></td>"; ?>
                                        <?php echo "<td><a class='btn btn-warning' href='javascript:void(0);' onclick = 'javascript:updateBus({$bus_id});'><i class='fal fa-edit'></i> Update</a></td>"; ?>
                                    </tr>
                                    <?php } }?>
                                </tbody>
                                </table>
                                <input type="hidden" name="busid" class="form-control">
                                <input type="hidden" name="action1" class="form-control">
                            </form>
                        </div>
                                <?php
                                break;
                        }
                        // if ($source = 'add_bus') {
                        //        include "includes/add_bus.php";   
                        // }
                        // elseif ($source = '') {
                        //     
                        // }   
                        ?>


                        <?php

                        if (isset($_GET['clone_bus_id'])) {
                            $bus_id = $_GET['clone_bus_id'];


                        $query = "SELECT *  FROM  timetable WHERE bus_id=$bus_id";
                        $select_posts = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($select_posts)) {
                            $source = $row['ori_place_code'];
                            $destination = $row['dest_place_code'];
                            $intermediate = $row['via_route_code'];
                            $category = $row['bus_type'];
                            $deptime = $row['dept_time'];
                            $destime = $row['desti_time'];
                            $totalkm = $row['totalkm'];
                            $totalfa = $row['total_fare'];

                            $query_new = "INSERT INTO timetable(ori_place_code,dest_place_code,via_route_code,dept_time,desti_time,totalkm,total_fare,bus_type) VALUES({$source}, '{$destination}', '{$intermediate}', '{$deptime}', '{$destime}', '{$totalkm}', '{$totalfa}', '{$category}'";
                            }

                            $clone_bus = mysqli_query($connection,$query_new);

                            header("Location:buses.php");
                        }
                        ?>



                        <?php 

                        if (isset($_POST['action1'])) {

                            if ($_POST['action1'] == "Delete") {
                                # code...
                                $bus_idd = $_POST['busid'];
                                // echo "$bus_idd";
                                $query = "DELETE FROM timetable WHERE bus_id = {$bus_idd} ";
                                $delete_bus = mysqli_query($connection,$query);
                                if(!$delete_bus) {
                                    die("Query Failed" . mysqli_error($delete_bus));
                                }
                                header("Location: buses.php");
                            }
                        }

                        ?>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include"includes/admin_footer.php"; ?>