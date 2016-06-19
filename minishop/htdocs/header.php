<?php
session_start();
?>

<head>
    <meta charset="utf-8" />
    <title>MiniShop</title>
    <link rel="icon" type="image/png" href="/assests/img/icon.png" />
    <link type="text/css" rel="stylesheet" href="/assets/css/application.css?<?php echo time(); ?>"/>
    <link type="text/css" rel="stylesheet" href="/assets/css/header.css?<?php echo time(); ?>"/>
    <link type="text/css" rel="stylesheet" href="/assets/css/cart.css?<?php echo time(); ?>"/>
    <link type="text/css" rel="stylesheet" href="/assets/css/product.css?<?php echo time(); ?>"/>
    <link type="text/css" rel="stylesheet" href="/assets/css/users.css?<?php echo time(); ?>"/>
    <link type="text/css" rel="stylesheet" href="/assets/css/category.css?<?php echo time(); ?>"/>
    <link type="text/css" rel="stylesheet" href="/assets/css/font-awesome/css/font-awesome.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
</head>

<html><body>
	<header>
		<div class="left">
			<a href="/index.php"><i class="fa fa-home"></i></a>
			<a href="/cart.php"><i class="fa fa-shopping-cart"></i></a>
		</div>

		<div class="right">
			<?php
				if (isset($_SESSION['id']))
				{
					if ($_SESSION['lvl'] == 1)
						echo '<a href="/admin/index.php"><i class="fa fa-lock"></i></a>';
					echo '<a href="/logout.php"><i class="fa fa-sign-out"></i></a>';
				}
				else
				{
					echo '<a href="/signup.php">Signup</a>';
					echo '<a href="/login.php"><i class="fa fa-sign-in"></i></a>';
				}
			?>
		</div>
	</header>

	<div id="background"></div>
