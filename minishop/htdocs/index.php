<?php

include("header.php");
include("includes/db_connect.php");
include("includes/product.php");

$db = db_connect();
$products = get_all_products($db);

?>

<div class="bloc">
	<h1>Welcome on shop !</h1>
	<a href="product.php?id=1">aston_martin_v8_vantage</a>
	<br>
	<a href="product.php?id=2">aston_martin_vanquish</a>
	<br>
	<a href="product.php?id=3">audi_r8</a>
</div>

</body></html>