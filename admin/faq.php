<?php include"includes/admin_header.php";
?>
     
 <script language="javascript">
    function deletefaq(faq_id) {
            if (confirm("Are you sure?")) {
                document.frmFaq.action2.value = "delete";
                document.frmFaq.faqid.value = faq_id;
                document.frmFaq.submit();   
            }
     }
     function updatefaq(faq_id) {
        document.frmFaq.action2.value = "update";
        document.frmFaq.faqid.value = faq_id;
        document.frmFaq.action = "update_faq.php";
        document.frmFaq.submit();
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
                            <small><?php echo $_SESSION['s_username']; ?></small>
                            <small style="float:right"><a href="add_faq.php">+</a></small>
                        </h1>

                        <div style="overflow: auto;">

                                <table class="table table-bordered table-hover"> 
                                <thead>
                                    <tr>
                                        <th>FAQ_Id</th>
                                        <th>FAQ Questions</th>
                                        <th>FAQ Answers</th>
                                        <th>Delete</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <form action ="" method="post" name="frmFaq">
                                <tbody>
                                    
                                    <?php
                                        $query = "SELECT * FROM faq";
                                        $select_faq=mysqli_query($connection,$query);
                                        if (!$select_faq) {
                                            # code...
                                            die("Query Failed");
                                        }
                                        while ($row = mysqli_fetch_assoc($select_faq)) {
                                            # code...
                                            $faq_id = $row['faq_id'];
                                            $faq_que = $row['faq_que'];
                                            $faq_ans = $row['faq_ans'];
                                        
                                    ?>
                                    <tr>
                                        <td><?php echo $faq_id ?></td>
                                        <td><?php echo $faq_que?></td>
                                        <td><?php echo $faq_ans ?></td>
                                        <?php echo "<td><a class='btn btn-danger' href='javascript:void(0);' onclick='javascript:deletefaq({$faq_id});'><i class='fal fa-trash-alt'></i> Delete</a></td>"; ?>
                                        <?php echo "<td><a class='btn btn-warning' href='javascript:void(0);' onclick='javascript:updatefaq({$faq_id})'><i class='fal fa-edit'></i> Update</a></td>"; ?>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                </table>
                                <input type="hidden" name="action2">
                                <input type="hidden" name="faqid">
                            </form>
                        </div>


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

                        if (isset($_POST['action2'])) {
                            
                            if ($_POST['action2'] == "delete") {
                                # code...
                                $faq_idd = $_POST['faqid'];
                            // echo "$bus_idd";
                            $query = "DELETE FROM faq WHERE faq_id = {$faq_idd} ";

                            $delete_faq = mysqli_query($connection,$query);
                            if(!$delete_faq) {
                                die("Query Failed" . mysqli_error($delete_faq));
                            }
                            header("Location: faq.php");
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