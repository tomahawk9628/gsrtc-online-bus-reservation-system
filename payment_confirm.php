<?php include "includes/gsrtc_header.php"; ?>
<?php
	if (!isset($_SESSION['name'])) {
		# code...
		header("location: index.php");
	}
	//print_r($_SESSION);
	$name = $_SESSION['name'];
	$age = $_SESSION['age'];
	$email = $_SESSION['email'];
	$gen = $_SESSION['gen'];
	$bid = $_SESSION['bid'];
	$seats = $_SESSION['seats'];
	$fare = $_SESSION['fare'];
	$date = $_SESSION['date'];
	$regid = time();
	$query = "INSERT INTO registration(reg_id, bus_id, name, email, age, gender, seats, fare, travel_date) VALUES('$regid', '$bid', '$name', '$email', '$age', '$gen', '$seats', '$fare', '$date')";
	$insertreg = mysqli_query($connection, $query);
	if (!$insertreg) {
		# code...
		die("Query Failed");
	}
	$_SESSION['regid'] = $regid;
	header("location: result.php");
?>
<?php include "includes/gsrtc_footer.php"; ?>