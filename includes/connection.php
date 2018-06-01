<?php
	$servername = "localhost";
	$username = "root";
	$password = "default";
	$dbname = "tepisi.com";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		die("nije se konektovao" . mysqli_connect_error());
	}
?>