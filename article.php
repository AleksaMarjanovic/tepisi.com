<?php
	include("commons/header.php");
	include("includes/connection.php");

	$artikal = $_GET["artID"];
	
	$sql = "SELECT a.*, b.oznaka FROM tepih as a INNER JOIN jed_mere as b ON a.jed_mere_id = b.id WHERE a.id = '$artikal'";
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


			//prikaz tabele metraza
			if ($red["status_id"] == 1) {

				$izlaz .= "<div id=table-container>";
				$izlaz .= "<table>";
				$izlaz .= "<tr>";
				$izlaz .= "<th>Sifra</th>";
				$izlaz .= "<th>Naziv</th>";
				$izlaz .= "<th>Sirina (m)</th>";
				$izlaz .= "<th>Duzina (m)</th>";
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
				$izlaz .= "<td id=tab-sir>" . $red["sirina"] . "</td>";
				$izlaz .= "<td><input id=tab-duz type=number placeholder=duzina min=1 step=0.01 max=100></td>";
				$izlaz .= "<td id=tab-kol>kolicina</td>";
				$izlaz .= "<td id=tab-jed>" . $red[17] . "</td>";
				$izlaz .= "<td id=tab-osn-cena>" . $red["cena"] . "</td>";
				$izlaz .= "<td id=tab-ukp-cena id=tab-ukp-cena> - </td>";
				$izlaz .= "<td><button id=tab-kupi-btn name=tab-kupi-btn>kupi</button></td>";
				$izlaz .= "<td id=tab-stat hidden>" . $red["status_id"] . "</td>";
				$izlaz .= "</tr>";
				$izlaz .= "</table>";
				$izlaz .= "<p class=kupi-info>Artikal je dodat u korpu</p>";
				$izlaz .= "</div>";
			}
			//kraj prikaz tabele metraza


			//prikaz tabele komadi
			//prikaz pravougaonih komada
			if ($red["status_id"] == 4 && $red["precnik"] === NULL) {

				$izlaz .= "<div id=table-container>";
				$izlaz .= "<table>";
				$izlaz .= "<tr>";
				$izlaz .= "<th>Sifra</th>";
				$izlaz .= "<th>Naziv</th>";
				$izlaz .= "<th>Sirina</th>";
				$izlaz .= "<th>Duzina</th>";
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
				$izlaz .= "<td id=tab-sir>" . $red["sirina"] . " m </td>";
				$izlaz .= "<td id=tab-duz>" . $red["default_duzina"] . " m </td>";
				$izlaz .= "<td><input type=number id=tab-kol placeholder=kolicina min=1 max=10></td>";
				$izlaz .= "<td id=tab-jed>" . $red[17] . "</td>";
				$izlaz .= "<td id=tab-osn-cena>" . $red["cena"] . "</td>";
				$izlaz .= "<td id=tab-ukp-cena> - </td>";
				$izlaz .= "<td><button id=tab-kupi-btn name=tab-kupi-btn>kupi</button></td>";
				$izlaz .= "<td id=tab-stat hidden>" . $red["status_id"] . "</td>";
				$izlaz .= "</tr>";
				$izlaz .= "</table>";
				$izlaz .= "<p class=kupi-info>Artikal je dodat u korpu</p>";
				$izlaz .= "</div>";
			}
			//kraj prikaz pravougaonih komada

			//prikaz precnik komada
			if ($red["status_id"] == 4 && $red["precnik"] !== NULL) {

				$izlaz .= "<div id=table-container>";
				$izlaz .= "<table>";
				$izlaz .= "<tr>";
				$izlaz .= "<th>Sifra</th>";
				$izlaz .= "<th>Naziv</th>";
				$izlaz .= "<th>Precnik</th>";
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
				$izlaz .= "<td id=tab-pre>" . $red["precnik"] . " m </td>";
				$izlaz .= "<td><input type=number id=tab-kol placeholder=kolicina min=1 max=10></td>";
				$izlaz .= "<td id=tab-jed>" . $red[17] . "</td>";
				$izlaz .= "<td id=tab-osn-cena>" . $red["cena"] . "</td>";
				$izlaz .= "<td id=tab-ukp-cena> - </td>";
				$izlaz .= "<td><button id=tab-kupi-btn name=tab-kupi-btn>kupi</button></td>";
				$izlaz .= "<td id=tab-stat hidden>" . $red["status_id"] . "</td>";
				$izlaz .= "</tr>";
				$izlaz .= "</table>";
				$izlaz .= "<p class=kupi-info>Artikal je dodat u korpu</p>";
				$izlaz .= "</div>";
			}
			//kraj prikaz precnik komada
			//kraj prikaz komadi

			//prikaz rinfus
			if ($red["status_id"] == 2) {

				$izlaz .= "<div id=table-container>";
				$izlaz .= "<table>";
				$izlaz .= "<tr>";
				$izlaz .= "<th>Sifra</th>";
				$izlaz .= "<th>Naziv</th>";
				$izlaz .= "<th>Sirina</th>";
				$izlaz .= "<th>Duzina</th>";
				$izlaz .= "<th>Jedinica mere</th>";
				$izlaz .= "<th> Cena po jedinici mere</th>";
				$izlaz .= "<th>Cena</th>";
				$izlaz .= "<th></th>";
				$izlaz .= "<th hidden></th>";
				$izlaz .= "</tr>";
				$izlaz .= "<tr>";
				$izlaz .= "<td id=tab-sif>" . $red["sifra"] . "</td>";
				$izlaz .= "<td id=tab-naz>" . $red["naziv"] . "</td>";
				$izlaz .= "<td id=tab-sir>" . $red["sirina"] . " m </td>";
				$izlaz .= "<td id=tab-duz>" . $red["default_duzina"] . " m </td>";
				$izlaz .= "<td id=tab-jed>" . $red[17] . "</td>";
				$izlaz .= "<td id=tab-osn-cena>" . $red["cena"] . "</td>";
				$izlaz .= "<td id=tab-ukp-cena> - </td>";
				$izlaz .= "<td><button id=tab-kupi-btn name=tab-kupi-btn>kupi</button></td>";
				$izlaz .= "<td id=tab-stat hidden>" . $red["status_id"] . "</td>";
				$izlaz .= "</tr>";
				$izlaz .= "</table>";

				if (isset($_SESSION["username"])) {
					$izlaz .= "<p class=kupi-info>Artikal je dodat u korpu</p>";
				}
				
				$izlaz .= "</div>";
			}
			//kraj prikaz rinfus

			
		}



		$izlaz .= "</div>";
		
	}

	echo $izlaz;

	include("commons/footer.php");
?>