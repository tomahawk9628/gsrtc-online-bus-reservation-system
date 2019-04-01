<?php include "includes/admin_header.php"; ?>
<?php 
	if (isset($_POST['insert-faq'])) {
		# code...
		$faque = addslashes($_POST['faque']);
		$faqans = addslashes($_POST['faqans']);
		$query = "INSERT INTO faq(faq_que, faq_ans, faq_active) VALUES('$faque', '$faqans', 1)";
		//echo $query;
		$insertfaq = mysqli_query($connection, $query);
		if (!$insertfaq) {
			# code...
			die(mysqli_error($insertfaq));
		}
		else {
			echo '<script language = "javascript">alert("Insert Successfull"); document.location = "faq.php";';
			echo '</script>';
		}
	}
?>

<div id="wrapper">
	<div id="page-wrapper">
        <div class="container-fluid">
        	<h1 class="page-header">
                            Welcome
                            <small><?php echo $_SESSION['s_username']; ?></small>
                            <small style="float:right"><a href="add_faq.php">+</a></small>
                        </h1>
			<form action="" method="post" enctype="multipart/form-data">
				
	<div class="form-group">
		<label for="faque">Faq Questions</label>
		<input type="text" class="form-control" name="faque" required="yes">
	</div>

	<div class="form-group">
		<label for="faqans">Faq Answers</label>
		<input type="text" class="form-control" name="faqans" required="yes">
	</div>

	

	<br>

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="insert-faq" value="Add Faq">
	</div>
</form>
</div></div></div>
<?php include"includes/admin_footer.php"; ?>