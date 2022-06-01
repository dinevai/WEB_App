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
		<link rel="stylesheet" href="css/insert_book_style.css">
	</head>
	<body style="background-image: url('img/saved.jpg');">
		<form class="cd-form" method="POST" action="#">
			<center><legend style='color:crimson;'>
			<b>Insert the informations to add new BOOK!</b></legend></center>
			
				<div class="error-message" id="error-message">
					<p id="error"></p>
				</div>
				
				<div class="icon">
					<input class="b-isbn" id="b_isbn" type="number" name="b_isbn" placeholder="ISBN" required 
					style='background-color:white;' />
				</div>
				
				<div class="icon">
					<input class="b-title" type="text" name="b_title" placeholder="Book Title" required 
					style='background-color:white;' />
				</div>
				
				<div class="icon">
					<input class="b-author" type="text" name="b_author" placeholder="Author Name" required 
					style='background-color:white;' />
				</div>
				
				<div>
				<h4 style='color:crimson;'><b>About the Category of the BOOK</b></h4>
				
					<p class="cd-select icon">
						<select class="b-category" name="b_category" style='background-color:white;'>
							<option>History</option>
							<option>Comics</option>
							<option>Fiction</option>
							<option>Non-Fiction</option>
							<option>Biography</option>
							<option>Medical</option>
							<option>Fantasy</option>
							<option>Education</option>
							<option>Sports</option>
							<option>Technology</option>
							<option>Literature</option>
							<option>Poetry</option>
							<option>Romance</option>
							<option>Psychology</option>
						</select>
					</p>
				</div>
				
				<div class="icon">
					<input class="b-price" type="number" name="b_price" placeholder="E-Points Price" required 
					style='background-color:white;' />
				</div>
				
				<div class="icon">
					<input class="b-copies" type="number" name="b_copies" placeholder="Number of Copies" required 
					style='background-color:white;' />
				</div>
				
				<br />
				<input class="b-isbn" type="submit" name="b_add" value="Add book" style="background:crimson;" 
				style='background-color:white;' />
		</form>
	<body>
	
	<?php
		if(isset($_POST['b_add']))
		{
			$query = $con->prepare("SELECT isbn FROM book WHERE isbn = ?;");
			$query->bind_param("s", $_POST['b_isbn']);
			$query->execute();
			
			if(mysqli_num_rows($query->get_result()) != 0)
				echo error_with_field("A book with that ISBN already exists", "b_isbn");
			else
			{
				$query = $con->prepare("INSERT INTO book VALUES(?, ?, ?, ?, ?, ?);");
				$query->bind_param("ssssdd", $_POST['b_isbn'], $_POST['b_title'], $_POST['b_author'], $_POST['b_category'], $_POST['b_price'], $_POST['b_copies']);
				
				if(!$query->execute())
					die(error_without_field("ERROR: Couldn't add book"));
				echo success("New book record has been added");
			}
		}
	?>
</html>