<?php
//	$con = new mysqli('localhost', 'root', '' , 'librarygh');
	$con = mysqli_connect('localhost', 'root', '' , 'librarygh', 3307);
/*	$dsn = 'mysql:host=localhost; dbname=libraryms';
	$username = 'root';
	$password = '';
	try{
		$db = new PDO($dsn, $username, $password);
	} catch(PDOException $e){
		$error_message = $e->getMessage();
		die("ERROR".mysqli_connect_error());
	}*/

	if(!$con){
		die("ERROR: Couldn't connect to database".mysqli_connect_error());
	}
?>


