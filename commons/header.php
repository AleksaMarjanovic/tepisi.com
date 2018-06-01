<?php
	ini_set("session.gc_maxlifetime", 10800);
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="UTF-8">
	<title>Tepisi.com</title>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div id="header-top">
				<div id="header-logo">
					<a href="index.php"><img src="images/tepisi-logo.png"></a>
				</div>
				<div id="header-search">
					<form action="search.php" method="GET">
						<input type="text" placeholder="pretraga" id="search" name="search">
						<button id="search-btn" name="search-btn">
							<img src="images/lupica.png">
						</button>
					</form>
					<div id="header-search-result">
						<span class="header-search-result-close">x</span>
						<p class="search-result-output"></p>
					</div>
				</div>
				<div id="header-login">
					<?php
						if (isset($_SESSION["username"])) {
							echo "<p>Dobrodosli: </p>";
							echo "<p><a href= user.php?uID=$_SESSION[user_id]>" . $_SESSION["username"] . "</a></p>";
							echo "<p><a href= cart.php?uID=$_SESSION[user_id]>Korpa</a></p>";
							echo "<form action= includes/logout-inc.php method=GET>";
								echo "<p><input type=submit id=logout-btn name=logout-btn value=logout></p>";
							echo "</form>";
						}
						else{
							echo "<p><a href=register.php>Registracija</a></p>";
							echo "<p class=header-login-btn>Prijava</p>";
						}
					?>

					<div class="header-login-form">
						<form action="includes/login-inc.php" method="POST">
							<span class="header-login-form-close">x</span>
							<p><input type="text" placeholder="username" name="login-username"></p>
							<p><input type="password" placeholder="passowrd" name="login-password"></p>
							<p><input type="submit" value="login" name="login-form-submit"></p>
							<p class="login-error"><?php echo $_SESSION["login-error"]; ?></p>
						</form>
					</div>
				</div>
			</div>
			<div id="header-nav">
				<ul>
					<li><a href="#">O nama</a></li>
					<li><a href="catalog.php">Katalog</a></li>
					<li><a href="#">Reference</a></li>
					<li><a href="#">Kontakt</a></li>
				</ul>
			</div>
		</div>
		<!--sadrzaj strane-->
		<div id="sadrzaj-strane">