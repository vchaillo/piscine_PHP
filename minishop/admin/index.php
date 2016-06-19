<?php

session_start();
if (!isset($_SESSION['lvl']) || $_SESSION['lvl'] == 0)
    header('Location: /minishop/index.php');

include("../header.php");

?>

<div class="bloc">
	<h1>Welcome Admin !</h1>
	<h4><a class="btn" href="/minishop/admin/users.php">Users</a></h4>
	<h4><a class="btn" href="/minishop/admin/commands.php">Commands</a></h4>
	<h4><a class="btn" href="/minishop/admin/products.php">Products</a></h4>
	<!-- <h4><a class="btn" href="/minishop/admin/categories.php">Caterories</a></h4> -->
</div>

</body></html>