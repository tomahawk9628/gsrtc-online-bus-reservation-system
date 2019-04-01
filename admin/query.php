<?php include"includes/admin_header.php"; ?>
<?php
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
                            <small><?php echo $_SESSION['s_username']; ?></small>
                        </h1>

                        <div style="overflow: auto;">
                        <?php 

                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }
                        else {
                            $source = "";
                        }

                        switch ($source) {
                            case 'add_bus':
                                include "includes/add_bus.php";
                                break;
                            
                            case 'update':
                                include "includes/update.php";
                                break;

                            default: ?>
                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>Query_Id</th>
                                        <th>User_Name</th>
                                        <th>Email</th>
                                        <th>Query</th>
                                        <!--<th>Replied?</th>-->
                                        <th>Date</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    
                                    <?php 

                                        $query = "SELECT * FROM feedback";
                                        $select_posts = mysqli_query($connection,$query);

                                        while($row = mysqli_fetch_assoc($select_posts)) {
                                            $feed_id = $row['feed_id'];
                                            //$query_bus_id = $row['query_bus_id'];
                                            $user_name = $row['user_name'];
                                            $user_email = $row['user_email'];
                                            $query = $row['query'];
                                            $feed_date = $row['feed_date'];
                                            //$query_replied = $row['query_replied'];
                                        

                                     ?>
                                    <tr>
                                        <td><?php echo $feed_id ?></td>
                                        <td><?php echo $user_name ?></td>
                                        <td><?php echo $user_email ?></td>
                                        <td><?php echo $query ?></td>
                                        <td><?php echo $feed_date ?></td>
                                        <?php echo "<td><a class='btn btn-danger' href='query.php?delete=$feed_id'><i class='fal fa-trash-alt'></i> Delete</a></td>"; ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                </table><?php
                                break;
                        }
                        ?>
                    </div>
                        <?php 

                        if (isset($_GET['delete'])) {
                            
                            $query_idd = $_GET['delete'];
                            // echo "$bus_idd";
                            $query = "DELETE FROM feedback WHERE feed_id = {$query_idd} ";

                            $delete_query = mysqli_query($connection,$query);
                            echo "<script language='javascript'>document.location='query.php'</script>";
                            if(!$delete_query) {
                                die("Query Failed" . mysqli_error($connection));
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