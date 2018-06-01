$(function(){

	/*artikli tabela */
		//sredjujem tabelu ako je artikal u statusu 1 (metraza)
		if ($("#tab-stat").text() == 1) {

			$("#tab-duz").on("keyup change",function(){

			sir = $("#tab-sir").text();
			duz = $("#tab-duz").val();
			pre = "";

			osn_cena = parseFloat($("#tab-osn-cena").text());

			kol = $("#tab-kol").text((sir * duz).toFixed(2));
			kol = $("#tab-kol").text();//ponavljam duplo zbog ajax-a(ne salje drugacije)

			ukp_cena = $("#tab-ukp-cena").text((sir * duz * osn_cena).toFixed(2));
			ukp_cena = $("#tab-ukp-cena").text();//ponavljam duplo zbog ajax-a(ne salje drugacije)


			if (duz > 100) {
				ukp_cena = $("#tab-ukp-cena").text(" - ");
			}

			});
		}
		

		//sredjujem tabelu ako je artikal u statusu 2 (rinfus)
		if ($("#tab-stat").text() == 2) {


			sir = parseFloat($("#tab-sir").text());
			duz = parseFloat($("#tab-duz").text());

			pre = "";
			kol = "";
			jed_mere = $("#tab-jed").text();

			osn_cena = parseFloat($("#tab-osn-cena").text());

			ukp_cena = parseFloat($("#tab-ukp-cena").text((sir * duz * osn_cena * (70/100)).toFixed(2)));
			ukp_cena = $("#tab-ukp-cena").text();//ponavljam duplo zbog ajax-a(ne salje drugacije)

		}


		//sredjujem tabelu ako je artikal u statusu 4 (komadi)
		if ($("#tab-stat").text() == 4) {

				$("#tab-kol").on("keyup change", function(){

					kol = $("#tab-kol").val().replace(/[^0-9]/g, "");


					if ($("#tab-pre").text() != "") {
						pre = parseFloat($("#tab-pre").text());
						sir = "";
						duz = "";
					}
					else{
						sir = parseFloat($("#tab-sir").text());
						duz = parseFloat($("#tab-duz").text());
						pre = "";
					
					}

					osn_cena = parseFloat($("#tab-osn-cena").text());

					ukp_cena = $("#tab-ukp-cena").text((kol * osn_cena).toFixed(2));
					ukp_cena = $("#tab-ukp-cena").text();//ponavljam duplo zbog ajax-a(ne salje drugacije)

					if (kol > 10) {
						ukp_cena = $("#tab-ukp-cena").text(" - ");
					}

				});
		}

		//sredjujem tabelu ako je artikal u statusu 3 (otpad)
		if ($("#tab-stat").text() == 3) {

			$("#tab-kol").on("keyup change", function(){

				sir = "";
				duz = "";
				pre = "";
				jed_mere = $("#tab-jed").text();

				kol = $("#tab-kol").val().replace(/[^0-9]/g, "");

				osn_cena = $("#tab-osn-cena").text();

				ukp_cena = $("#tab-ukp-cena").text((kol * osn_cena).toFixed(2));
				ukp_cena = $("#tab-ukp-cena").text();//ponavljam duplo zbog ajax-a(ne salje drugacije)

				if (kol > 100) {
						ukp_cena = $("#tab-ukp-cena").text(" - ");
					}

			});
		}
	/*kraj artikli tabela */

	/*registracija*/

		$("#reg-fiz-cont > label,#reg-fiz-cont > input").click(function(){
			$("#reg-fiz-cont").css({"background": "#f7ce3e"});
			$("#reg-prv-cont").css({"background": "#1a2930", "color": "#F5F5F5"});
			$("#pib-cont").hide();
			
		});
		$("#reg-prv-cont > label,#reg-prv-cont > input").click(function(){
			$("#reg-prv-cont").css({"background": "#f7ce3e"});
			$("#reg-fiz-cont").css({"background": "#1a2930", "color": "#F5F5F5"});
			$("#pib-cont").show();
		});

	/*kraj registracija*/

	/*login*/
	$(".header-login-btn").click(function(){
		//$(".header-login-form").show();
		$(".header-login-form").fadeIn(600);

	});

	$(".header-login-form-close").click(function(){
		//$(".header-login-form").hide();
		$(".header-login-form").fadeOut(600);

	});

	if (document.URL.includes("login_error")) {
		$(".header-login-form").show();
			
		}
	/*kraj login*/

	/*kupovina*/
	//uzimam vrednosti koje trebam da prosledim(pored onih koje su vec definisane) i prosledjujem ih ajax-om
	sifra = $("#tab-sif").text();
	naziv = $("#tab-naz").text();
	precnik = $("#tab-pre").text();
	jed_mere = $("#tab-jed").text();

	$("#cart-buy").click(function(){
		alert("Hvala vam sto kupujete kod nas");
	});

	$("#tab-kupi-btn").click(function(){
		$.ajax({
			type: "POST",
			url: "includes/cart-inc.php",
			data: {"sifra" : sifra, "naziv" : naziv, "sirina" : sir, "duzina" : duz, "precnik" : pre, "kolicina" : kol, "jed_mere" : jed_mere, "osn_cena" : osn_cena, "ukp_cena" : ukp_cena},
			success: function(data){
				$(".kupi-info").show();
				alert(data);
			}
		});
	});
	/*kraj kupovina*/

	//pretraga
	$("#search").on("keyup", function(){
		search_string = $("#search").val();

		if (search_string.length >= 3) {
			$("#header-search-result").show();
			$.ajax({
				type: "POST",
				url: "includes/search-inc.php",
				data: {"search_string" : search_string},
				success: function(data){
					$(".search-result-output").html(data);
				}
			});
		};
		if (search_string < 3) {
			$("#header-search-result").hide();
		}
		$(".header-search-result-close").click(function(){
			search_string = "";
			$("#header-search-result").hide();
		});

	});
	//kraj pretraga
	
});