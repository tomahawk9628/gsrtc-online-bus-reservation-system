<?php include "includes/config.php"; ?>
<?php
session_start();
$lastid = $_SESSION['last_id'];
$time = date('H:i:s');
$query = "UPDATE login_record SET log_out = '$time' WHERE log_id = $lastid";
//echo $query;
$insertq = mysqli_query($connection, $query);
if (!$insertq) {
	# code...
	die("Insertion Failed");
}
$_SESSION['s_username'] = "";
$_SESSION['s_email'] = "";
$_SESSION['last_id'] = "";
session_unset(); 
session_destroy();
?>
<!-- <script language="javascript">document.location="index.php"</script> -->
<?php header('location: index.php'); ?>