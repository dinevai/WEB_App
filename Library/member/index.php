<?php
	require "../db_connect.php";
	require "../message_display.php";
	require "../verify_logged_out.php";
	require "../header.php";
?>

<html>
	<head>
		<title>LMS</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css">
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css">
		<link rel="stylesheet" type="text/css" href="css/index_style.css">
	</head>
	<body style="background-image: url('img/opacity.png');">
		<form class="cd-form" method="POST" action="#">
		
		<center><legend style="color:crimson;">
		<b>Member Login</b></legend></center>
			
			<div class="error-message" id="error-message">
				<p id="error"></p>
			</div>
			
			<div class="icon">
				<input class="m-user" type="text" name="m_user" placeholder="Username" required 
				style='background-color:white;' />
			</div>
			
			<div class="icon">
				<input class="m-pass" type="password" name="m_pass" placeholder="Password" required 
				style='background-color:white;' />
			</div>
			
			<input type="submit" value="Login" name="m_login" style="background:crimson;" />
			
			<br /><br /><br /><br />
			
			<p align="center" style='color:grey;'><b>Don't have an account?</b>&nbsp;<a href="register.php" style="text-decoration:none; color:crimson;">
			<b>Register Now!</b></a>

			<p align="center"><a href="../index.php" style="text-decoration:none; color:crimson;">
			<b>Go Back</b></a>
		</form>
	</body>
	
	<?php
		if(isset($_POST['m_login']))
		{
			$query = $con->prepare("SELECT id, balance FROM member WHERE username = ? AND password = ?;");
			$query->bind_param("ss", $_POST['m_user'], sha1($_POST['m_pass']));
			$query->execute();
			$result = $query->get_result();
			
			if(mysqli_num_rows($result) != 1)
				echo error_without_field("Invalid details or Account has not been activated yet!");
			else 
			{
				$resultRow = mysqli_fetch_array($result);
				$balance = $resultRow[1];
			if($balance < 0){
				echo error_without_field("Your account has been suspended. Please contact librarian for further information!");
			} else {
					$_SESSION['type'] = "member";
					$_SESSION['id'] = $resultRow[0];
					$_SESSION['username'] = $_POST['m_user'];
					header('Location: home.php');
				}
			}
		}
	?>
	
</html>