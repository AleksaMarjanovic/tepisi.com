<?php
session_start();

#TODO proveriti zasto prihvata tacku u imenu i prezimenu
	if (isset($_REQUEST["register"])) {

		include("connection.php");
		
		$lice = $_REQUEST["reg-lice"];

		$ime = ucfirst(trim(mysqli_real_escape_string ($conn, $_REQUEST["reg-ime"])));
		$prezime = ucfirst(trim(mysqli_real_escape_string ($conn, $_REQUEST["reg-pre"])));
		$ime_prezime = $ime . " " . $prezime;

		$adresa = mysqli_real_escape_string ($conn, $_REQUEST["reg-adr"]);
		$grad = ucfirst(mysqli_real_escape_string ($conn, $_REQUEST["reg-grad"]));
		$post_br = trim(mysqli_real_escape_string ($conn, $_REQUEST["reg-post-br"]));
		$pib = trim(mysqli_real_escape_string ($conn, $_REQUEST["reg-pib"]));
		$username = trim(mysqli_real_escape_string ($conn, $_REQUEST["reg-user"]));

		$password = mysqli_real_escape_string ($conn, $_REQUEST["reg-pass"]);
		$pon_password = mysqli_real_escape_string ($conn, $_REQUEST["reg-pon-pass"]);

		$email = trim(mysqli_real_escape_string ($conn, $_REQUEST["reg-email"]));
		$pon_email = mysqli_real_escape_string ($conn, $_REQUEST["reg-pon-email"]);
		

		$sql = "SELECT * FROM users";
		$sql_result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($sql_result) > 0) {
			while ($red = mysqli_fetch_array($sql_result)) {

				$user_array[] = $red["username"];
				$email_array[] = $red["email"];
				$pib_array[] = $red["pib"];

			}
		}


		//proveravam validnost inputa

		if (empty($ime)) {
			$_SESSION["ime_error"] = "polje ime mora biti popunjeno";
			header("Location: ../register.php?reg_error");
		}
		elseif (!preg_match("/^[a-zA-Z]+\b/", $ime)) {
			$_SESSION["ime_error"] = "format imena nije validan";
			header("Location: ../register.php?reg_error");
		}
		else{
			$_SESSION["ime_error"] = "";
		}
		

		if (empty($prezime)) {
			$_SESSION["prezime_error"] = "polje prezime mora biti popunjeno";
			header("Location: ../register.php?reg_error");
		}
		elseif (!preg_match("/^[a-zA-Z]+\b/", $prezime)) {
			$_SESSION["prezime_error"] = "format prezimena nije validan";
			header("Location: ../register.php?reg_error");
		}
		else{
			$_SESSION["prezime_error"] = "";
		}


		if (empty($adresa)) {
			$_SESSION["adresa_error"] = "polje adresa mora biti popunjeno";
			header("Location: ../register.php?reg_error");
		}
		else{
			$_SESSION["adresa_error"] = "";
		}


		if (empty($grad)) {
			$_SESSION["grad_error"] = "polje grad mora biti popunjeno";
			header("Location: ../register.php?reg_error");
		}
		elseif (!preg_match("/^[a-zA-Z]+\b/", $grad)) {
			$_SESSION["grad_error"] = "format grada nije validan";
			header("Location: ../register.php?reg_error");
		}
		else{
			$_SESSION["grad_error"] = "";
		}


		if (empty($post_br)) {
			$_SESSION["post_br_error"] = "polje postanski broj mora biti popunjeno";
			header("Location: ../register.php?reg_error");
		}
		else{
			$_SESSION["post_br_error"] = "";
		}


		if (empty($pib) && $lice == 1) {
			$_SESSION["pib_error"] = "polje pib mora biti popunjeno";
			header("Location: ../register.php?reg_error");
		}
		elseif (in_array($pib, $pib_array) && $lice == 1) {
			$_SESSION["pib_error"] = "uneti pib je vec u upotrebi";
			header("Location: ../register.php?reg_error");
		}
		elseif (!preg_match("/^[0-9]+\b/", $pib) && $lice == 1) {
			$_SESSION["pib_error"] = "format piba nije validan";
			header("Location: ../register.php?reg_error");
		}
		else{
			$_SESSION["pib_error"] = "";
		}


		if (empty($username)) {
			$_SESSION["username_error"] = "polje username mora biti popunjeno";
			header("Location: ../register.php?reg_error");
		}
		elseif (in_array($username, $user_array)) {
			$_SESSION["username_error"] = "username je u upotrebi";
			header("Location: ../register.php?reg_error");
		}
		else{
			$_SESSION["username_error"] = "";
		}


		if (empty($password)) {
			$_SESSION["password_error"] = "polje password mora biti popunjeno";
			header("Location: ../register.php?reg_error");
		}
		elseif (empty($pon_password)) {
			$_SESSION["password_error"] = "polje ponovi password mora biti popunjeno";
			header("Location: ../register.php?reg_error");
		}
		elseif ($password != $pon_password) {
			$_SESSION["password_error"] = "password se ne gadja";
			header("Location: ../register.php?reg_error");
		}
		else{
			$_SESSION["password_error"] = "";
		}


		if (empty($email)) {
			$_SESSION["email_error"] = "polje email mora biti popunjeno";
			header("Location: ../register.php?reg_error");
		}
		elseif (in_array($email, $email_array)) {
			$_SESSION["email_error"] = "email je u upotrebi";
			header("Location: ../register.php?reg_error");
		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$_SESSION["email_error"] = "format email-a nije ispravan";
			header("Location: ../register.php?reg_error");
		}
		elseif (empty($pon_email)) {
			$_SESSION["email_error"] = "polje ponovi email mora biti popunjeno";
			header("Location: ../register.php?reg_error");
		}
		elseif ($email != $pon_email) {
			$_SESSION["email_error"] = "email se ne gadja";
			header("Location: ../register.php?reg_error");
		}
		else{
			$_SESSION["email_error"] = "";
		}


		if ($_SESSION["ime_error"] == "" && $_SESSION["prezime_error"] == "" && $_SESSION["adresa_error"] == "" && $_SESSION["grad_error"] == "" && $_SESSION["post_br_error"] == "" && $_SESSION["pib_error"] == "" && $_SESSION["username_error"] == "" && $_SESSION["password_error"] == "" && $_SESSION["email_error"] == "") {
			
			$pass_hash = md5($password);

			$sql = "INSERT INTO users(username, password, email, ime_prezime, adresa, grad, pos_br,	prv_lice, pib) VALUES('$username', '$pass_hash', '$email', '$ime_prezime', '$adresa', '$grad', '$post_br', '$lice', '$pib')";
			$sql_result = mysqli_query($conn, $sql);

			header("Location: ../register.php?reg_succes");
		}

		//kraj provere validnosti inputa

	}
	else{
		header("Location: ../register.php");
	}

?>