<?php
	require "db_connect.php";
	require "header.php";
	session_start();
	
	if(empty($_SESSION['type']));
	else if(strcmp($_SESSION['type'], "librarian") == 0)
		header("Location: librarian/home.php");
	else if(strcmp($_SESSION['type'], "member") == 0)
		header("Location: member/home.php");
?>

<html>
	<head>
		<title>LMS</title>
		<link rel="stylesheet" type="text/css" href="css/index_style.css" />
	</head>
	<body style="background-image: url('img/back.jpg');">
		<div id="allTheThings">
			<div id="member">
				<a href="member" style="color:crimson; font-family: 'Papyrus', Fantasy;">
					<img src="img/reader.png" width="250px" height="auto"/><br />
					<b style="font-size:30px">&nbsp;Member Login</b>
					<p style="color:white; background:crimson;">Click here to login 
					 as a <br> member of the LIBRARY!</p>
				</a>
			</div>
			<div id="verticalLine" style="border-left: solid crimson;">
				<div id="librarian" style="transform: scale(1.1);">
					<a id="librarian-link" href="librarian" style="color:crimson; font-family: 'Papyrus', Fantasy;">
						<img src="img/library.png" width="250px" height="220" /><br />
					<b style="font-size:30px">	&nbsp;&nbsp;&nbsp;Librarian Login</b>
					<p style="color:crimson; background:white;">Click here to login as the 
				<br> librarian of the LIBRARY! </p>
					</a>
				</div>
			</div>
		</div>
	</body>
</html>