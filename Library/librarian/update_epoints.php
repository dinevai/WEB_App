<?php
	require "../db_connect.php";
	require "../message_display.php";
	require "verify_librarian.php";
	require "header_librarian.php";
?>

<html>
	<head>
		<title>LMS</title>
		<link rel="stylesheet" type="text/css" href="../css/global_styles.css" />
		<link rel="stylesheet" type="text/css" href="../css/form_styles.css" />
		<link rel="stylesheet" href="css/update_balance_style.css">
	</head>
	<body style="background-image: url('img/saved.jpg');">
		<form class="cd-form" method="POST" action="#">
			<center><legend style='color:crimson;'>
			<b>Update Member's Total E-Points</b></legend></center>
			
				<div class="error-message" id="error-message">
					<p id="error"></p>
				</div>
				
				<div class="icon">
					<input class="m-user" type='text' name='m_user' id="m_user" placeholder="Member username" required 
					style='background-color:white;' />
				</div>
				
				<div class="icon">
					<input class="m-balance" type="number" name="m_balance" placeholder="E-Points to add" required 
					style='background-color:white;' />
				</div>
				
				<input type="submit" name="m_add" value="Update E-Points" style="background:crimson" />
		</form>
	</body>
	
	<?php
		if(isset($_POST['m_add']))
		{
			$query = $con->prepare("SELECT username FROM member WHERE username = ?;");
			$query->bind_param("s", $_POST['m_user']);
			$query->execute();
			if(mysqli_num_rows($query->get_result()) != 1)
				echo error_with_field("Invalid username", "m_user");
			else
			{
				$query = $con->prepare("UPDATE member SET balance = balance + ? WHERE username = ?;");
				$query->bind_param("ds", $_POST['m_balance'], $_POST['m_user']);
				if(!$query->execute())
					die(error_without_field("ERROR: Couldn\'t add balance"));
				echo success("Balance successfully updated");
			}
		}
	?>
</html>