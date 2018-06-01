<?php
	include("commons/header.php");
	include("includes/connection.php");

	$user_id = $_SESSION["user_id"];

	echo "<h1>Korisnicka strana</h1>";

	echo "<div class=user-container>";

	if (isset($_SESSION["username"]) && $_REQUEST["uID"] == $user_id) {
		
		$sql = "SELECT * FROM users WHERE id = '$user_id'";
		$sql_result = mysqli_query($conn, $sql);


		if (mysqli_num_rows($sql_result) > 0) {
			while ($red = mysqli_fetch_assoc($sql_result)) {

				$izlaz = "<p><b>Username: </b>" . $red["username"] . "</p>";
				$izlaz .= "<p><b>Email: </b>" . $red["email"] . "</p>";
				$izlaz .= "<p><b>Ime i prezime: </b>" . $red["ime_prezime"] . "</p>";
				$izlaz .= "<p><b>Adresa: </b>" . $red["adresa"] . "</p>";
				$izlaz .= "<p><b>Grad: </b>" . $red["grad"] . "</p>";
				$izlaz .= "<p><b>Postanski broj: </b>" . $red["pos_br"] . "</p>";

				if ($red["prv_lice"] != 0) {
					$izlaz .= "<p><b>PIB: </b>" . $red["pib"] . "</p>";
				}
				

				$izlaz .= "<div class=user-izmeni-link><p><a href=user.php?change_user_data&uID=" . $user_id . ">Izmeni licne podatke</a></p></div>";

			}//kraj while
		}//kraj if
		
		echo $izlaz;
		echo "</div>";

	}//kraj if
	elseif (isset($_REQUEST["change_user_data"]) && $_REQUEST["uID"] == $user_id) {

		$izlaz = "<form>";

		if (mysqli_num_rows($sql_result) > 0) {
			while ($red = mysqli_fetch_assoc($sql_result)) {
				$izlaz .= "<fieldset>";
					$izlaz .= "<legend>Promeni password</legend>";
					$izlaz .= "<p>Stari password: </p>";
					$izlaz .= "<p><input type text name=change-pass-old id=change-pass-old></p>";
					$izlaz .= "<p>Novi password: </p>";
					$izlaz .= "<p><input type text name=change-pass-new id=change-pass-new></p>";
					$izlaz .= "<p>Ponovi novi password: </p>";
					$izlaz .= "<p><input type text name=change-pass-new-pon id=change-pass-new-pon></p>";
				$izlaz .= "</fieldset>";

				$izlaz .= "<fieldset>";
					$izlaz .= "<legend> Promeni licne podatke</legend>";
					$izlaz .= "<p>Email: </p>";
					$izlaz .= "<p><input type text name=change-email id=change-email value=" . $red["email"] . "></p>";
					$izlaz .= "<p>Ime: </p>";
					$izlaz .= "<p><input type text name=change-ime id=change-ime value=" . $red["email"] . "></p>";
					$izlaz .= "<p>Prezime: </p>";
					$izlaz .= "<p><input type text name=change-prezime id=change-prezime value=" . $red["email"] . "></p>";				
				$izlaz .= "</fieldset>";
			}//kraj while
			


		}//kraj if
		else{
			echo "nista";
		}
			
		$izlaz .= "</form>";
		echo $izlaz;
		echo "</div>";
	}//kraj elseif
	else{
		header("Location: index.php");
	}





	include("commons/footer.php");
?>