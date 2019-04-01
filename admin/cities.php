<?php include"includes/admin_header.php"; ?>

<script type="text/javascript">
    
    function deleteCity(city_id)
    {//alert(city_id);
        if(confirm("Are you Sure?"))
        {
            document.frmCity.city_id.value=city_id;
            document.frmCity.action1.value="Delete";
            document.frmCity.submit();
        }
        return false;
    }
    function updateCity(city_id)
    {
        document.frmCity.city_id.value=city_id;
        document.frmCity.action1.value="Update";
        document.frmCity.action="update_city.php";
        document.frmCity.submit();
    }
</script>

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
                            <?php if (isset($_POST['action1'])) { 
                            //echo $_POST['city_id'];die;
                                        if ($_POST['action1']=="Delete") {
                                            # code...
                                        
                                            $city_d_id = $_POST['city_id'];
                                            $query = "DELETE FROM citycode WHERE city_code = $city_d_id";
                                            $deletecity = mysqli_query($connection,$query);
                                            $_POST['action1'] = "";
                                            if (!$deletecity) {
                                                # code...
                                                echo "Query Failed".mysqli_error($deletecity);
                                            }
                                        }
                                  }
                            
                            ?>

                            <?php 
                            if(isset($_POST['submit'])) {

                                $city_name = $_POST['city_n'];
                                if($city_name=="") {
                                    echo " This Field Must Not be Empty";
                                    exit;
                                }

                                $query = "INSERT INTO citycode(city_name) VALUE ('$city_name')";
                                $create_category = mysqli_query($connection,$query);

                                if(!$create_category) {
                                    die("Query Failed");
                                }
                            }
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add City</label>
                                    <input class="form-control" type="text" name="city_n">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add City">
                                </div> 
                            </form>
                        </div>
                        <form action="" method="post" name="frmCity">
                        <div class="colE-xs-6" style="overflow: auto;">

                            <?php 
                            $query = "SELECT *  FROM  citycode";
                            $select_categories = mysqli_query($connection,$query);
                            ?>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>City Name</th>
                                        <th>Delete</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php  
                                        while($row = mysqli_fetch_assoc($select_categories)) {
                                        $city_id = $row['city_code'];
                                        $city_name = $row['city_name'];

                                        echo "<tr>";
                                        echo "<td> {$city_id} </td>";
                                        echo "<td> {$city_name} </td>";
                                        echo "<td><a class='btn btn-danger' href='javascript:void(0);' onclick='javascript:deleteCity({$city_id});'><i class='fal fa-trash-alt'></i> Delete</a></td>";
                                        echo "<td><a class='btn btn-warning' href='javascript:void(0);' onclick='javascript:updateCity({$city_id})'><i class='fal fa-edit'></i> Update</a></td>";
                                        echo "</tr>";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
<div class="form-group">
<input type="hidden" name="city_id" class="form-control">
<input type="hidden" name="action1" class="form-control">
</div>
</form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include"includes/admin_footer.php"; ?>