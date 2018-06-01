<?php
	include("commons/header.php");
	include("includes/connection.php");

	
	
	$izlaz = "<h1>Katalog</h1>";
	$izlaz .= "<div class=categories>";


	//prikaz glavne str. kataloga
	if ($_GET["cID"] == "") {
		$izlaz .= "<div class=category-container>";
		$izlaz .= "<div class=category>";
		$izlaz .= "<a href=catalog.php?cID=1><img src=images/metraza/crveni-marvel.jpg><h2>Metraza</h2></a>";
		$izlaz .= "</div>";
		$izlaz .= "<div class=category>";
		$izlaz .= "<a href=catalog.php?cID=2><img src=images/metraza/crveni-marvel.jpg><h2>Komadi</h2></a>";
		$izlaz .= "</div>";
		$izlaz .= "<div class=category>";
		$izlaz .= "<a href=catalog.php?cID=3><img src=images/metraza/crveni-marvel.jpg><h2>Rinfus</h2></a>";
		$izlaz .= "</div>";

		if ($_SESSION["user_id"] == 1) {
			
			$izlaz .= "<div class=category>";
			$izlaz .= "<a href=catalog.php?cID=4><img src=images/metraza/crveni-marvel.jpg><h2>Otpad</h2></a>";
			$izlaz .= "</div>";
			
		}
		$izlaz .= "</div>";

		echo $izlaz;
	}
	//kraj prikaz glavne str. kataloga

	//prikaz strane metraza
	if ($_GET["cID"] == 1) {
		$izlaz .= "<div class=category-container>";
		$izlaz .= "<div class=category>";
		$izlaz .= "<a href=catalog.php?cID=5><img src=images/metraza/crveni-marvel.jpg><h2>5 x 20m</h2></a>";
		$izlaz .= "</div>";
		$izlaz .= "<div class=category>";
		$izlaz .= "<a href=catalog.php?cID=6><img src=images/metraza/crveni-marvel.jpg><h2>3 x 20m</h2></a>";
		$izlaz .= "</div>";
		$izlaz .= "<div class=category>";
		$izlaz .= "<a href=catalog.php?cID=7><img src=images/metraza/crveni-marvel.jpg><h2>2 x 20m</h2></a>";
		$izlaz .= "</div>";
		$izlaz .= "<div class=category>";
		$izlaz .= "<a href=catalog.php?cID=8><img src=images/metraza/crveni-marvel.jpg><h2>1 x 20m</h2></a>";
		$izlaz .= "</div>";
		$izlaz .= "</div>";

		echo $izlaz;
	}

	//prikaz metraza 5 x 20m
	if ($_GET["cID"] == 5) {
		$sql = "SELECT * FROM tepih WHERE status_id = 1 AND sirina = 5";
		$sql_result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($sql_result) > 0) {
			$izlaz .= "<div class=articles-container>";

			while ($red = mysqli_fetch_array($sql_result)) {

				$izlaz .= "<div class=articles>";
				$izlaz .= "<a href=article.php?artID=" . $red["id"] . "><img src=" . $red["slika"] . "><h3>" . $red["naziv"] . "</h3></a>";
				$izlaz .= "</div>";
			}

			$izlaz .= "</div>";
			echo $izlaz;
		}
	}
	//kraj prikaz metraza 5 x 20m

	//prikaz metraza 3 x 20m
	if ($_GET["cID"] == 6) {
		$sql = "SELECT * FROM tepih WHERE status_id = 1 AND sirina = 3";
		$sql_result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($sql_result) > 0) {
			$izlaz .= "<div class=articles-container>";

			while ($red = mysqli_fetch_array($sql_result)) {

				$izlaz .= "<div class=articles>";
				$izlaz .= "<a href=article.php?artID=" . $red["id"] . "><img src=" . $red["slika"] . "><h3>" . $red["naziv"] . "</h3></a>";
				$izlaz .= "</div>";
			}

			$izlaz .= "</div>";
			echo $izlaz;
		}
	}
	//kraj prikaz metraza 3 x 20m

	//prikaz metraza 2 x 20m
	if ($_GET["cID"] == 7) {
		$sql = "SELECT * FROM tepih WHERE status_id = 1 AND sirina = 2";
		$sql_result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($sql_result) > 0) {
			$izlaz .= "<div class=articles-container>";

			while ($red = mysqli_fetch_array($sql_result)) {

				$izlaz .= "<div class=articles>";
				$izlaz .= "<a href=article.php?artID=" . $red["id"] . "><img src=" . $red["slika"] . "><h3>" . $red["naziv"] . "</h3></a>";
				$izlaz .= "</div>";
			}

			$izlaz .= "</div>";
			echo $izlaz;
		}
	}
	//kraj prikaz metraza 2 x 20m

	//prikaz metraza 1 x 20m
	if ($_GET["cID"] == 8) {
		$sql = "SELECT * FROM tepih WHERE status_id = 1 AND sirina = 1";
		$sql_result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($sql_result) > 0) {
			$izlaz .= "<div class=articles-container>";

			while ($red = mysqli_fetch_array($sql_result)) {

				$izlaz .= "<div class=articles>";
				$izlaz .= "<a href=article.php?artID=" . $red["id"] . "><img src=" . $red["slika"] . "><h3>" . $red["naziv"] . "</h3></a>";
				$izlaz .= "</div>";
			}

			$izlaz .= "</div>";
			echo $izlaz;
		}
	}
	//kraj prikaz metraza 1 x 20m
	//kraj prikaz metraza

	//prikaz komadi
	if ($_GET["cID"] == 2) {

		$izlaz .= "<div class=category-container>";
		$izlaz .= "<div class=category>";
		$izlaz .= "<a href=catalog.php?cID=9><img src=images/metraza/crveni-marvel.jpg><h2>Veliki tepisi</h2></a>";
		$izlaz .= "</div>";
		$izlaz .= "<div class=category>";
		$izlaz .= "<a href=catalog.php?cID=10><img src=images/metraza/crveni-marvel.jpg><h2>Srednji tepisi</h2></a>";
		$izlaz .= "</div>";
		$izlaz .= "<div class=category>";
		$izlaz .= "<a href=catalog.php?cID=11><img src=images/metraza/crveni-marvel.jpg><h2>Mali tepisi</h2></a>";
		$izlaz .= "</div>";
		$izlaz .= "</div>";

		echo $izlaz;
	}

	//prikaz veliki komadi
	if ($_GET["cID"] == 9) {
		
		$sql = "SELECT * FROM tepih WHERE status_id = 4 AND (sirina * default_duzina) >= 4 OR (POW(precnik, 2) * PI()) >= 4";
		$sql_result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($sql_result) > 0) {
			$izlaz .= "<div class=articles-container>";

			while ($red = mysqli_fetch_array($sql_result)) {

				$izlaz .= "<div class=articles>";
				$izlaz .= "<a href=article.php?artID=" . $red["id"] . "><img src=" . $red["slika"] . "><h3>" . $red["naziv"] . "</h3></a>";
				$izlaz .= "</div>";
			}

			$izlaz .= "</div>";
			echo $izlaz;
		}
	}
	//kraj prikaz veliki komadi

	//prikaz srednji komadi
	if ($_GET["cID"] == 10) {
		
		$sql = "SELECT * FROM tepih WHERE status_id = 4 AND 1.5 <= (sirina * default_duzina) AND (sirina * default_duzina) < 4 OR 1.5 <= (POW(precnik, 2) * PI()) AND (POW(precnik, 2) * PI() < 4)";
		$sql_result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($sql_result) > 0) {
			$izlaz .= "<div class=articles-container>";

			while ($red = mysqli_fetch_array($sql_result)) {

				$izlaz .= "<div class=articles>";
				$izlaz .= "<a href=article.php?artID=" . $red["id"] . "><img src=" . $red["slika"] . "><h3>" . $red["naziv"] . "</h3></a>";
				$izlaz .= "</div>";
			}

			$izlaz .= "</div>";
			echo $izlaz;
		}
	}
	//kraj prikaz srednji komadi

	//prikaz mali komadi
	if ($_GET["cID"] == 11) {

		$sql = "SELECT * FROM tepih WHERE status_id = 4 AND (sirina * default_duzina) < 1.5 OR (POW(precnik, 2) * PI()) < 1.5";
		$sql_result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($sql_result) > 0) {
			$izlaz .= "<div class=articles-container>";

			while ($red = mysqli_fetch_array($sql_result)) {

				$izlaz .= "<div class=articles>";
				$izlaz .= "<a href=article.php?artID=" . $red["id"] . "><img src=" . $red["slika"] . "><h3>" . $red["naziv"] . "</h3></a>";
				$izlaz .= "</div>";
			}

			$izlaz .= "</div>";
			echo $izlaz;
		}
	}
	//kraj prikaz mali komadi
	//kraj prikaz komadi

	//prikaz rinfus
	if ($_GET["cID"] == 3) {

		$sql = "SELECT * FROM tepih WHERE status_id = 2";
		$sql_result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($sql_result) > 0) {
			$izlaz .= "<div class=articles-container>";

			while ($red = mysqli_fetch_array($sql_result)) {

				$izlaz .= "<div class=articles>";
				$izlaz .= "<a href=article.php?artID=" . $red["id"] . "><img src=" . $red["slika"] . "><h3>" . $red["naziv"] . "</h3></a>";
				$izlaz .= "</div>";
			}

			$izlaz .= "</div>";
			echo $izlaz;
		}
	}
	//kraj prikaz rinfus

	//prikaz otpad
	if ($_GET["cID"] == 4) {

		$sql = "SELECT a.* , SUM( stanje_magacin ), b.oznaka FROM tepih AS a INNER JOIN jed_mere AS b ON a.jed_mere_id = b.id WHERE status_id = 3";
		$sql_result = mysqli_query($conn, $sql);

		$izlaz = "<h1>Katalog</h1>";

		if (mysqli_num_rows($sql_result) > 0) {

		$izlaz .= "<div id=article-container>";

			while ($red = mysqli_fetch_array($sql_result)) {

			$izlaz .= "<div id=article-image>";
			$izlaz .= "<img src=" . $red["slika"] . ">";
			$izlaz .= "</div>";
			$izlaz .= "<div id=article-desc>";
			$izlaz .= "<h2>". $red["naziv"] . "</h2>";
			$izlaz .= "<p>boja : " . $red["boja"] . "</p>";
			$izlaz .= "<p>materijal : " . $red["materijal"] . "</p>";
			$izlaz .= "<p>duzina dlake : " . $red["duz_dlake"] . "mm</p>";
			$izlaz .= "<p>opis : </br>" . $red["opis"] . "</p>";
			$izlaz .= "</div>";

			$izlaz .= "<div id=table-container>";
			$izlaz .= "<table>";
			$izlaz .= "<tr>";
			$izlaz .= "<th>Sifra</th>";
			$izlaz .= "<th>Naziv</th>";
			$izlaz .= "<th>Kolicina</th>";
			$izlaz .= "<th>Jedinica mere</th>";
			$izlaz .= "<th> Cena po jedinici mere</th>";
			$izlaz .= "<th>Cena</th>";
			$izlaz .= "<th></th>";
			$izlaz .= "<th hidden></th>";
			$izlaz .= "</tr>";
			$izlaz .= "<tr>";
			$izlaz .= "<td id=tab-sif>" . $red["sifra"] . "</td>";
			$izlaz .= "<td id=tab-naz>" . $red["naziv"] . "</td>";
			$izlaz .= "<td><input type=number id=tab-kol placeholder=kolicina min=1 max=100></td>";
			$izlaz .= "<td id=tab-jed>" . $red[18] . "</td>";
			$izlaz .= "<td id=tab-osn-cena>" . $red["cena"] . "</td>";
			$izlaz .= "<td id=tab-ukp-cena> - </td>";
			$izlaz .= "<td><button id=tab-kupi-btn name=tab-kupi-btn>kupi</button></td>";
			$izlaz .= "<td id=tab-stat hidden>" . $red["status_id"] . "</td>";
			$izlaz .= "</tr>";
			$izlaz .= "</table>";
			$izlaz .= "<p class=kupi-info>Artikal je dodat u korpu</p>";
			$izlaz .= "</div>";			
			}

			//$izlaz .= "</div>";
			echo $izlaz;
		}
	}
	//kraj prikaz otpad

	echo "</div>";
	

	include("commons/footer.php");
?>