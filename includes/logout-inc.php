<?php
	session_start();

	if (isset($_REQUEST["logout-btn"])) {

		session_destroy();
		header("Location: ". $_SERVER["HTTP_REFERER"]);
	}
?>