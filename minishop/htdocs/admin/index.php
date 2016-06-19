<?php

include("../header.php");

if (!isset($_SESSION['lvl']) || $_SESSION['lvl'] == 0)
    header('Location: /index.php');

?>

<div class="bloc">
	<h1>Welcome Admin !</h1>
	<a href="/admin/users.php">Users</a>
	<a href="/admin/commands.php">Commands</a>
	<a href="/admin/products.php">Products</a>
	<a href="/admin/categories.php">Caterories</a>
</div>

</body></html>