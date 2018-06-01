<?php
	session_start();

	if (isset($_SESSION["username"])) {
		$sifra = $_REQUEST["sifra"];
		$naziv = $_REQUEST["naziv"];
		$sirina = $_REQUEST["sirina"];
		$duzina = $_REQUEST["duzina"];
		$precnik = $_REQUEST["precnik"];
		$kolicina = $_REQUEST["kolicina"];
		$jed_mere = $_REQUEST["jed_mere"];
		$osn_cena = $_REQUEST["osn_cena"];
		$ukp_cena = $_REQUEST["ukp_cena"];

		echo "artikal je dodat u korpu";

		$_SESSION["korpa"][] = array("sifra" => $sifra, "naziv" => $naziv, "sirina" => $sirina, "duzina" => $duzina, "precnik" => $precnik, "kolicina" => $kolicina, "jed_mere" => $jed_mere, "osn_cena" => $osn_cena, "ukp_cena" => $ukp_cena);		
	}
	else{
		echo "Morate biti ulogovani da biste mogli da kupujete";
	}

?>