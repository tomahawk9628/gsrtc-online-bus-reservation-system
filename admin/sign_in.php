<?php include "includes/admin_header.php"; ?>
	<div id="wrapper">
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
	                    <h1 class="page-header">
	                        Welcome
	                        <small><?php echo $_SESSION['s_username']; ?></small>
	                        <!-- <small style="float:right"><a href="add_bus.php">+</a></small> -->
	                    </h1>
	                    <div style="overflow: auto;">
	                    <table class="table table-bordered table-hower">
	                    	<thead>
	                    		<th>Login Id</th>
	                    		<th>Login Username</th>
	                    		<th>Login Date</th>
	                    		<th>Login Time</th>
	                    		<th>Logout Time</th>
	                    	</thead>
	                    	<tbody>
	                    		<?php
	                    			$q1 = "SELECT * FROM user";
	                    			$getuser = mysqli_query($connection, $q1);
	                    			$user1 = array();
	                    			while ($row = mysqli_fetch_assoc($getuser)) {
	                    				# code...
	                    				array_push($user1, $row);
	                    			}
	                    			$query = "SELECT * FROM login_record";
	                    			$getlogin = mysqli_query($connection, $query);
	                    			if (!$getlogin) {
	                    				# code...
	                    				die("Get Query Failed");
	                    			}
	                    			while ($row = mysqli_fetch_assoc($getlogin)) {
	                    				# code...
	                    				foreach ($user1 as $u) {
	                    					# code...
		                    				if ($row['user_id'] == $u['user_id']) {
		                    					# code...
		                    					$username = $u['username'];
		                    				}
		                    			}
	                    				$log_id = $row['log_id'];
	                    				//$username = $row['username'];
	                    				$log_date = $row['log_date'];
	                    				$log_time = $row['log_time'];
	                    				$log_out = $row['log_out'];
	                    		?>
	                    		<td><?php echo $log_id; ?></td>
	                    		<td><?php echo $username; ?></td>
	                    		<td><?php echo $log_date; ?></td>
	                    		<td><?php echo $log_time; ?></td>
	                    		<td><?php echo $log_out; ?></td>
	                    	</tbody>
	                    <?php } ?>
	                    </table>
	                </div>
	                 </div>      
				</div>
			</div>
		</div>
	</div>
<?php include "includes/admin_footer.php"; ?>