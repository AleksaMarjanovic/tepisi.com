<?php
	include("commons/header.php");
?>

	<div id="reg-container">
		<form action="includes/register-inc.php" method="POST" id="reg-form">

			<div id="reg-form-lica">
			
				<p id="reg-fiz-cont">
					<label for="reg-fiz">Fizicko lice</label>
					<input type="radio" name="reg-lice" value="0" id="reg-fiz" checked>
				</p>
			
				<p id="reg-prv-cont">
					<label for="reg-prv">Pravno lice</label>
					<input type="radio" name="reg-lice" value="1" id="reg-prv">
				</p>
			
			</div>


			<ul>
				<li>
					<p>
						<label for="reg-ime">Ime : </label></br>
						<input type="text" id="reg-ime" name="reg-ime">
					</p>
				</li>

				<li>
					<p>
						<label for="reg-pre">Prezime : </label></br>
						<input type="text" id="reg-pre" name="reg-pre">
					</p>
				</li>

				<li>
					<p>
						<label for="reg-adr">Adresa : </label></br>
						<input type="text" id="reg-adr" name="reg-adr">
					</p>
				</li>

				<li>
					<p>
						<label for="reg-grad">Grad : </label></br>
						<input type="text" id="reg-grad" name="reg-grad">
					</p>
				</li>

				<li>
					<p>
						<label for="reg-post-br">Postanski broj : </label></br>
						<input type="text" id="reg-post-br" name="reg-post-br">
					</p>
				</li>

				<li id="pib-cont" hidden>
					<p>
						<label for="reg-pib">PIB : </label></br>
						<input type="text" id="reg-pib" name="reg-pib">
					</p>
				</li>
			</ul>

			<ul>
				<li>
					<p>
						<label for="reg-user">Username : </label></br>
						<input type="text" id="reg-user" name="reg-user">
					</p>
				</li>
			
				<li>
					<p>
						<label for="reg-pass">Password : </label></br>
						<input type="password" id="reg-pass" name="reg-pass">
					</p>
				</li>
			
				<li>
					<p>
						<label for="reg-pon-pass">Ponovi password : </label></br>
						<input type="password" id="reg-pon-pass" name="reg-pon-pass">
					</p>
				</li>
			
				<li>
					<p>
						<label for="reg-email">Email : </label></br>
						<input type="email" id="reg-email" name="reg-email">
					</p>
				</li>
			
				<li>
					<p>
						<label for="reg-pon-email">Ponovi email : </label></br>
						<input type="email" id="reg-pon-email" name="reg-pon-email">
					</p>
				</li>
			</ul>

			<p><input type="submit" value="Registruj se" name="register"></p>

			<div class="reg-form-error-report">
				<p class="reg-form-error"><?php echo $_SESSION["ime_error"]; ?></p>
				<p class="reg-form-error"><?php echo $_SESSION["prezime_error"]; ?></p>
				<p class="reg-form-error"><?php echo $_SESSION["adresa_error"]; ?></p>
				<p class="reg-form-error"><?php echo $_SESSION["grad_error"]; ?></p>
				<p class="reg-form-error"><?php echo $_SESSION["post_br_error"]; ?></p>
				<p class="reg-form-error"><?php echo $_SESSION["pib_error"]; ?></p>
				<p class="reg-form-error"><?php echo $_SESSION["username_error"]; ?></p>
				<p class="reg-form-error"><?php echo $_SESSION["password_error"]; ?></p>
				<p class="reg-form-error"><?php echo $_SESSION["email_error"]; ?></p>
			</div>

		</form>

	</div>

<?php

	include("commons/footer.php");
?>