<?php
	session_start();

	if (isset($_REQUEST["login-form-submit"])) {
		include("connection.php");
		$_SESSION["login-error"] = "";

		$username = $_REQUEST["login-username"];
		$password = $_REQUEST["login-password"];

		$sql = "SELECT username, password, id, prv_lice FROM users WHERE username = '$username'";
		$sql_result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($sql_result) > 0) {
			
			$red = mysqli_fetch_assoc($sql_result);

				if (md5($password) != $red["password"]) {
					$_SESSION["login-error"] = "password nije ispravan";
					header("Location: " . $_SERVER["HTTP_REFERER"] . "?login_error");
				}
				else{
					$_SESSION["login-error"] = "";
					$_SESSION["username"] = $red["username"];
					$_SESSION["user_id"] = $red["id"];
					$_SESSION["lice"] = $red["prv_lice"];
					header("Location: " . $_SERVER["HTTP_REFERER"]);
				}
			
		}
		else{
			$_SESSION["login-error"] = "korisnik ne postoji";
			header("Location: " . $_SERVER["HTTP_REFERER"] . "?login_error");
		}

	}
	else{
		header("Location: ../index.php");
	}
	
?>