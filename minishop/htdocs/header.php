<?php
session_start();
?>

<head>
    <title>MiniShop</title>
    <meta charset="utf-8" />
    <link type="text/css" rel="stylesheet" href="/assets/css/application.css?<?php echo time(); ?>"/>
    <link type="text/css" rel="stylesheet" href="/assets/css/header.css?<?php echo time(); ?>"/>
    <link type="text/css" rel="stylesheet" href="/assets/css/index.css?<?php echo time(); ?>"/>
    <link rel="icon" type="image/png" href="/assests/img/icon.png" />
</head>

<html><body>
	<header>
		<div class="left">
			<a href="/index.php">Home</a>
			<a href="/cart.php">Cart</a>
		</div>

		<div class="right">
			<?php
				if (isset($_SESSION['id']))
				{
					if ($_SESSION['lvl'] == 1)
						echo '<a href="/admin/index.php">Admin</a>';
					echo '<a href="/logout.php">Logout</a>';
				}
				else
				{
					echo '<a href="/login.php">Login</a>';
					echo '<a href="/signup.php">Signup</a>';
				}
			?>
		</div>
	</header>

	<div id="background"></div>
