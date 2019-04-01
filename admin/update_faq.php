<?php include "includes/admin_header.php"; ?>
<?php
	if (isset($_POST['action2'])) {
	 	# code...
	 	if ($_POST['action2'] == "update") {
	 		$faq_new_id = $_POST['faqid'];
	 		$query = "SELECT * FROM faq WHERE faq_id = $faq_new_id";
	 		$selectfaq = mysqli_query($connection, $query);
	 		while ($row = mysqli_fetch_assoc($selectfaq)) {
	 			# code...
	 			$faq_que = $row['faq_que'];
	 			$faq_ans = $row['faq_ans'];
	 		}
	 	}
	 }
	 if (isset($_POST['update'])) {
	 	$faq_new_id = $_POST['faqid'];
	 	$faq_que = $_POST['faqque'];
	 	$faq_ans = $_POST['faqans'];
	 	$query = "UPDATE faq SET faq_que = '$faq_que', faq_ans = '$faq_ans' WHERE faq_id = $faq_new_id";
	 	$updatefaq = mysqli_query($connection, $query);
	 	if (!$updatefaq) {
	 		# code...
	 		die(mysqli_error($updatefaq));
	 	}
	 	else{
	 		echo' <script language="javascript"> 
	 			alert("Update Successfull"); 
	 			document.location = "faq.php";';
	 		echo'</script>';
	 		//header("location: faq.php");
	 	}
	 }

?>
<div id="wrapper">
	<div id="page-wrapper">
		<div class="container-fluid">
			<h1 class="page-header">
				Welcome<small><?php echo " ".$_SESSION['s_username']; ?></small>
			</h1>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<!-- <label for="source">Faq Id</label> -->
					<input value="<?php echo $faq_new_id; ?>" type="hidden" class="form-control" name="faqid">
				</div>

				<div class="form-group">
					<label for="destination">Faq Question</label>
					<input value="<?php echo $faq_que; ?>" type="text" class="form-control" name="faqque">
				</div>

				<div class="form-group">
					<label for="destination">Faq Answers</label>
					<input value="<?php echo $faq_ans; ?>" type="text" class="form-control" name="faqans">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="update" value="Update">
				</div>
			</form>
		</div>
	</div>
</div>
<?php include "includes/admin_footer.php"; ?>