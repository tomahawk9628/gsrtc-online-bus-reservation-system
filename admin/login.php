<?php
	include('includes/config.php');
	session_start(); ob_start();
	if (isset($_POST['Login'])) {
		# code...
		//echo "Hello";
		$email = mysqli_real_escape_string($connection,$_POST['email']);
		$pass = mysqli_real_escape_string($connection,sha1($_POST['pass']));
		$query = "SELECT * FROM user WHERE email = '$email'";
		$select_user = mysqli_query($connection,$query);

		if (!$select_user) {
			header("Location: index.php");
			exit;
			die("Query Failed" . mysqli_error($connection));
		}
		while ($row = mysqli_fetch_assoc($select_user)) {
				$db_email = $row['email'];
				$db_pass = $row['pass'];
				$db_user = $row['username'];
				$db_type = $row['user_type'];
			}
			if($db_email === $email && $db_pass === $pass)
			{
				$_SESSION['s_username'] = $db_user;
				$_SESSION['s_email'] = $db_email;
					//$_SESSION
				if($db_type == "admin")
				{
					//echo $_SESSION['s_username'];
					$date = date('Y-m-d');
					$time = date('H:i:s');
					$user = $_SESSION['s_username'];
					$query = "SELECT * FROM user WHERE username = '$user'";
					//echo $query;
					$selectuser = mysqli_query($connection, $query);
					while($row = mysqli_fetch_assoc($selectuser)) {
						$userid = $row['user_id'];
					}
					$query = "INSERT INTO login_record(user_id, log_date, log_time) VALUES('$userid', '$date', '$time')";
					$insertlog = mysqli_query($connection, $query);
					if (!$insertlog) {
						# code...
						die("Insertion Failed");
					}
					$_SESSION['last_id'] = mysqli_insert_id($connection);
					header("Location: dash.php");
					exit;
				}
				else
				{
					$db_email = "nothing";
				$_SESSION['loginerror'] = "Incorrect E-mail or Password";
				header('location:index.php');
					echo "<br><a href = 'index.php'>Ok</a>";
					exit;
				}
			}
			else
			{
				$db_email = "nothing";
				$_SESSION['loginerror'] = "Incorrect E-mail or Password";
				header('location:index.php');
				echo "<br><a href = 'index.php'>Ok</a>";
				exit;
			}
	}
?>