<?PHP
session_start();
?>

<html>
	<head>
		<title>MiniShop</title>
		<meta charset="UTF-8">
		<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
        <link rel="icon" type="image/png" href="img/icon.png" />
	</head>
	<body>
		<div id="global_content">
			<div class="images">
				<div class="admin">
                	<input class="admin_button" type="submit" name="submit" value="User" />
                	<input class="admin_button" type="submit" name="submit" value="Categories" />
                	<input class="admin_button" type="submit" name="submit" value="Products" />
				</div>
				<div class="admin2">
					<center>
						<h1>Hello Master</h1>
						<br />
						Be careful and don't make anything stupid whit our database please!
					</center>
				</div>
				
			</div>
		</div>
		<?php include("header.php") ?>
	</body>
</html>
