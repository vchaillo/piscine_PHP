<head>
    <meta charset="utf-8" />
    <title>MiniShop</title>
    <link rel="icon" type="image/png" href="/minishop/assests/img/icon.png" />
    <link type="text/css" rel="stylesheet" href="/minishop/assets/css/application.css?<?php echo time(); ?>"/>
    <link type="text/css" rel="stylesheet" href="/minishop/assets/css/inputs.css?<?php echo time(); ?>"/>
    <link type="text/css" rel="stylesheet" href="/minishop/assets/css/header.css?<?php echo time(); ?>"/>
    <link type="text/css" rel="stylesheet" href="/minishop/assets/css/cart.css?<?php echo time(); ?>"/>
    <link type="text/css" rel="stylesheet" href="/minishop/assets/css/product.css?<?php echo time(); ?>"/>
    <link type="text/css" rel="stylesheet" href="/minishop/assets/css/users.css?<?php echo time(); ?>"/>
    <link type="text/css" rel="stylesheet" href="/minishop/assets/css/category.css?<?php echo time(); ?>"/>
    <link type="text/css" rel="stylesheet" href="/minishop/assets/css/font-awesome/css/font-awesome.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
</head>

<html><body>
	<header>
		<div class="left">
			<a href="/minishop/index.php"><i class="fa fa-home"></i></a>
			<a href="/minishop/cart.php"><i class="fa fa-shopping-cart"></i></a>
		</div>

		<div class="right">
			<?php
				if (isset($_SESSION['id']))
				{
					if ($_SESSION['lvl'] == 1)
						echo '<a href="/minishop/admin/index.php"><i class="fa fa-lock"></i></a>';
					echo '<a href="/minishop/logout.php"><i class="fa fa-sign-out"></i></a>';
				}
				else
				{
					echo '<a href="/minishop/signup.php">Signup</a>';
					echo '<a href="/minishop/login.php"><i class="fa fa-sign-in"></i></a>';
				}
			?>
		</div>
	</header>

	<div id="background"></div>
