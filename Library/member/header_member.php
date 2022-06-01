<html>
	<head>
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700">
		<link rel="stylesheet" type="text/css" href="css/header_member_style.css" />
	</head>
	<body>
		<header style="background:crimson;">
			<div id="cd-logo">
				<a href="../">
					<img src="img/ic_logo2.svg" alt="Logo" width="45" height="45" />
					<p style="font-family: 'Papyrus', Fantasy;">LIBRARY</p>
				</a>
			</div>
			
			<div class="dropdown">
				<button class="dropbtn" style="background-color: crimson;">
					<p id="librarian-name"><?php echo $_SESSION['username'] ?></p>
				</button>
				<div class="dropdown-content">
					<a>
						<?php
							$query = $con->prepare("SELECT balance FROM member WHERE username = ?;");
							$query->bind_param("s", $_SESSION['username']);
							$query->execute();
							$epoints = (int)$query->get_result()->fetch_array()[0];
							echo "E-Points ".$epoints;
						?>
					</a>
					<a href="my_books.php">My books</a>
					<a href="../logout.php">Logout</a>
				</div>
			</div>
		</header>
	</body>
</html>