<?php
	include("connection.php");

	if (isset($_REQUEST["search_string"])) {
		$search_string = $_REQUEST["search_string"];

		$sql = "SELECT a.*, b.oznaka FROM tepih AS a INNER JOIN jed_mere AS b ON a.jed_mere_id = b.id WHERE a.naziv LIKE '%$search_string%' OR a.sifra LIKE '%$search_string%' OR a.boja LIKE '%$search_string%' OR a.materijal LIKE '%$search_string%' LIMIT 10";
		$sql_result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($sql_result) > 0) {
			while ($red = mysqli_fetch_assoc($sql_result)) {

				$izlaz = "<ul class=search-result>";
				$izlaz .= "<a href=article.php?artID=" . $red["id"] . ">";
				$izlaz .= "<li><img src=" . $red["slika"] . "></li>";
				$izlaz .= "<li><h4>" . $red["naziv"] . "</h4></li>";
				$izlaz .= "<li><h4>Jedinica mere:</h4><p>" . $red["oznaka"] . "</p></li>";
				$izlaz .= "<li><h4>Cena po jedinici mere:</h4><p>" . $red["cena"] . "</p></li>";
				$izlaz .= "</a>";
				$izlaz .= "</ul>";
				echo $izlaz;
			}
			
		}
		else{
			echo "nema rezultata";
		}
	}

?>