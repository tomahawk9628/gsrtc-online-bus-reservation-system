<?php include"includes/admin_header.php"; ?>
<?php
    if (isset($_POST['submit'])) {
         # code...
        $old = sha1($_POST['oldpass']);
        $username = $_SESSION['s_username'];
        $query = "SELECT * FROM user WHERE username = '$username' AND pass = '$old'";
        //echo $query;
        $getpass = mysqli_query($connection, $query);
        if (!$getpass) {
            # code...
            die("Old Query Failed");
        }
        $new1 = $_POST['newpass'];
        $new2 = $_POST['repass'];
        if (mysqli_num_rows($getpass) == 0) {
            # code...
            $_SESSION['error1'] = "Incorrect Password";
        } elseif($new1 === $new2) {
            $newpassword = sha1($new1);
            $q1 = "UPDATE user SET pass = '$newpassword' WHERE username = '$username'";
            $updatepass = mysqli_query($connection, $q1);
            if (!$updatepass) {
                # code...
                die("New Query Failed");
            }
            $_SESSION['success'] = "Password Changed!!!";
        } else {
            $_SESSION['error2'] = "Both the passwords doesn't match!!";
        }
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
                    </div>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class = "form-group">
                        <label for = "Old Password">Old Password:</label>
                        <input type="password" name="oldpass" class="form-control" required>  
                    </div>
                    <div class = "form-group">
                        <label for = "New Password">New Password:</label>
                        <input type="password" name="newpass" class="form-control" required>
                    </div>
                    <div class = "form-group">
                        <label for = "Re New Password">Retype New Password:</label>
                        <input type="password" name="repass" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit" value="Change">
                    </div>
                </form>
                <?php
                    if(isset($_SESSION['error1'])) {
                        echo $_SESSION['error1'];
                        $_SESSION['error1'] = "";
                    } 
                ?>
                <?php
                    if(isset($_SESSION['error2'])) {
                        echo $_SESSION['error2'];
                        $_SESSION['error2'] = "";
                    } 
                ?>
                <?php
                    if(isset($_SESSION['success'])) {
                        echo $_SESSION['success'];
                        $_SESSION['success'] = "";
                    } 
                ?>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include"includes/admin_footer.php"; ?>