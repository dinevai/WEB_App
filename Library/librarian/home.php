<?php
	require "../db_connect.php";
	require "verify_librarian.php";
	require "header_librarian.php";
?>

<html>
	<head>
		<title>LMS</title>
		<link rel="stylesheet" type="text/css" href="css/home_style.css" />
		<style>
			body{
				background-image: url('img/back.jpg');
			}
		</style>
	</head>
	<body>
		<div id="allTheThings">
			
			<a href="insert_book.php">
				<input type="button" value="Insert New Book" 
				style="background: MediumOrchid;"/>
			</a><br />

			<a href="update_copies.php">
				<input type="button" value="Update Copies of a Book" 
				style="background: pink;" />
			</a><br />

			<a href="delete_book.php">
				<input type="button" value="Delete Book Records" 
				style="background: LightSeaGreen;" />
			</a><br />

			<a href="display_books.php">
				<input type="button" value="Display Available Books" 
				style="background: pink;" />
			</a><br />

			<a href="pending_book_requests.php">
				<input type="button" value="Manage Pending Book Requests" 
				style="background: DarkCyan;" />
			</a><br />

			<a href="pending_registrations.php">
				<input type="button" value="Manage Pending Membership Registrations" 
				style="background: pink;" />
			</a><br />

			<a href="update_epoints.php">
				<input type="button" value="Update E-Points of Members" 
				style="background: MediumOrchid;" />
			</a><br />
			<br />

		</div>
	</body>
</html>