<?php
session_start();
?>

<head>
    <title>MiniShop</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="assets/css/application.css"/>
    <link type="text/css" rel="stylesheet" href="assets/css/header.css"/>
    <link rel="icon" type="image/png" href="assests/img/icon.png" />
</head>

<html><body>
	<header>
		<a href="index.php">Home</a>
		<a href="cart.php">Cart</a>

		<?php
			if (isset($_SESSION['id']))
				echo '<a href="logout.php">Logout</a>';
			else
			{
				echo '<a href="login.php">Login</a>';
				echo '<a href="signup.php">Signup</a>';
			}
		?>
	</header>