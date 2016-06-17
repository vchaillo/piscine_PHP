<?php

	session_start();

	if (isset($_SESSION) && isset($_SESSION['loggued_on_user']) && $_SESSION['loggued_on_user'] != '')
		echo $_SESSION['loggued_on_user'] . PHP_EOL;
	else
		echo "ERROR\n";

?>
