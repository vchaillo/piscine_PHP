<?php

session_start();
include("../header.php");

if (!isset($_SESSION['lvl']) || $_SESSION['lvl'] == 0)
    header('Location: /index.php');

?>

<div class="bloc">
	<h1>Welcome Admin !</h1>
</div>

</body></html>