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
                            <small><?php echo $_SESSION['s_username'];?></small>
                        </h1>



                        <div class="col-xs-6">

                            <?php

                                if (isset($_GET['delete'])) {
                                    $cat_del_id = $_GET['delete'];

                                    $query = "DELETE FROM bustype WHERE bus_type_id=$cat_del_id";

                                    $delete_cat = mysqli_query($connection,$query);

                                }

                            ?>




                            <?php 
                            if(isset($_POST['submit'])) {

                                $bus_type = $_POST['cat_title'];
                                if($bus_type=="" || empty($cat_title)) {
                                    echo " This Field Must Not be Empty";
                                }

                                $query = "INSERT INTO bustype(bus_type) VALUE ('$bus_type')";
                                $create_category = mysqli_query($connection,$query);

                                if(!$create_category) {
                                    die("Query Failed");
                                }
                            }
                            ?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_tite">Add Categories</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Categories">
                                </div> 
                            </form>
                        </div>

                        <div class="col-xs-6">
                            <div style="overflow: auto;">

                            <?php 
                            $query = "SELECT *  FROM  bustype";
                            $select_categories = mysqli_query($connection,$query);
                            ?>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php  
                                        while($row = mysqli_fetch_assoc($select_categories)) {
                                        $bus_type_id = $row['bus_type_id'];
                                        $bus_type = $row['bus_type'];

                                        echo "<tr>";
                                        echo "<td> {$bus_type_id} </td>";
                                        echo "<td> {$bus_type} </td>";
                                        echo "<td><a class='btn btn-danger' href='categories.php?delete=$bus_type_id'><i class='fal fa-trash-alt'></i> Delete</a></td>";
                                        echo "</tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include"includes/admin_footer.php"; ?>