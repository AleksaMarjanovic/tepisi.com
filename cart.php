<?php
	include ("commons/header.php");

	$izlaz = "<h1>Korpa</h1>";
	$izlaz .= "<div class=cart-container>";
	$izlaz .= "<table>";
	$izlaz .= "<tr>";
	$izlaz .= "<th>Redni br.</th>";
	$izlaz .= "<th>Sifra</th>";
	$izlaz .= "<th>Naziv</th>";
	$izlaz .= "<th>Sirina</br>(m)</th>";
	$izlaz .= "<th>Duzina</br>(m)</th>";
	$izlaz .= "<th>Precnik</br>(m)</th>";
	$izlaz .= "<th>Kolicina</th>";
	$izlaz .= "<th>Jedinica</br>mere</th>";
	$izlaz .= "<th>Cena po</br>JM</th>";
	$izlaz .= "<th>Cena</th>";
	$izlaz .= "<th></th>";
	$izlaz .= "</tr>";

	for ($i=0; $i < count($_SESSION["korpa"]); $i++) { 
		$izlaz .= "<tr>";
			$izlaz .= "<td>" . ($i + 1) . "</td>";
			$izlaz .= "<td>" . $_SESSION["korpa"][$i]["sifra"] ."</td>";
			$izlaz .= "<td>" . $_SESSION["korpa"][$i]["naziv"] ."</td>";
			$izlaz .= "<td>" . $_SESSION["korpa"][$i]["sirina"] ."</td>";
			$izlaz .= "<td>" . $_SESSION["korpa"][$i]["duzina"] ."</td>";
			$izlaz .= "<td>" . $_SESSION["korpa"][$i]["precnik"] ."</td>";
			$izlaz .= "<td>" . $_SESSION["korpa"][$i]["kolicina"] ."</td>";
			$izlaz .= "<td>" . $_SESSION["korpa"][$i]["jed_mere"] ."</td>";
			$izlaz .= "<td>" . $_SESSION["korpa"][$i]["osn_cena"] ."</td>";
			$izlaz .= "<td>" . $_SESSION["korpa"][$i]["ukp_cena"] ."</td>";
			$izlaz .= "<form action=cart.php method=GET><td><button type=submit name=cart-remove class=cart-remove value=$i>ukloni</button></form></td>";
		$izlaz .= "</tr>";

		$ukupno += ($_SESSION["korpa"][$i]["ukp_cena"]);		
	}
		$izlaz .= "<tr>";
		$izlaz .= "<td></td>";
		$izlaz .= "<td></td>";
		$izlaz .= "<td></td>";
		$izlaz .= "<td></td>";
		$izlaz .= "<td></td>";
		$izlaz .= "<td></td>";
		$izlaz .= "<td></td>";
		$izlaz .= "<td></td>";
		$izlaz .= "<td><b>ukupno: </b></td>";
		$izlaz .= "<td><b>" . $ukupno . "</b></td>";
		$izlaz .= "<td><button type=submit name=cart-buy id=cart-buy value=kupi>kupi</button><button type=submit name=cart-reset id=cart-reset value=ukloni-sve>ukloni-sve</button></td>";
		$izlaz .= "</tr>";

	$izlaz .= "</table>";
	$izlaz .= "</div>";


	echo $izlaz;


	//brisanje iz korpe
	if (isset($_REQUEST["cart-reset"])) {
		unset($_SESSION["korpa"]);
		header("Location: cart.php");
	}
	if (isset($_REQUEST["cart-remove"])) {
		$id = $_REQUEST["cart-remove"];
		unset($_SESSION["korpa"][$id]);
		sort($_SESSION["korpa"]);
		header("Location: cart.php");
	}
	//kraj brisanja iz korpe

	//unset($_SESSION["korpa"]);

	include ("commons/footer.php");
?>