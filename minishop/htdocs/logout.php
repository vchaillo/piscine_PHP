<?php

	session_start();
	unset($_SESSION["id"]);
	unset($_SESSION["lvl"]);
	unset($_SESSION["cart"]);
	unset($_SESSION["qte"]);
	header('Location: index.php')

?>
