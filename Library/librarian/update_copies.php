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
		<link rel="stylesheet" href="css/update_copies_style.css">
	</head>
	<body style="background-image: url('img/saved.jpg');">
		<form class="cd-form" method="POST" action="#">
			<center><legend style='color:crimson;'>
			<b>Insert here to update Book Copies</b></legend></center>
			
				<div class="error-message" id="error-message">
					<p id="error"></p>
				</div>
				
				<div class="icon">
					<input class="b-isbn" type='text' name='b_isbn' id="b_isbn" placeholder="Book ISBN" required 
					style='background-color:white;' />
				</div>
					
				<div class="icon">
					<input class="b-copies" type="number" name="b_copies" placeholder="Number of copies to add" required 
					style='background-color:white;' />
				</div>
						
				<input type="submit" name="b_add" value="Update Book Copies" style="background:crimson;"/>
		</form>
	</body>
	
	<?php
		if(isset($_POST['b_add']))
		{
			$query = $con->prepare("SELECT isbn FROM book WHERE isbn = ?;");
			$query->bind_param("s", $_POST['b_isbn']);
			$query->execute();
			if(mysqli_num_rows($query->get_result()) != 1)
				echo error_with_field("Invalid ISBN", "b_isbn");
			else
			{
				$query = $con->prepare("UPDATE book SET copies = copies + ? WHERE isbn = ?;");
				$query->bind_param("ds", $_POST['b_copies'], $_POST['b_isbn']);
				if(!$query->execute())
					die(error_without_field("ERROR: Couldn\'t update book copies"));
				echo success("Number of book copies has been updated");
			}
		}
	?>
</html>