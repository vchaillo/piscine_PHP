<?php
session_start();
?>

<html>
	<head>
		<title>BabyShop</title>
		<meta charset="UTF-8">
		<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
        <link rel="icon" type="image/png" href="img/icon.png" />
	</head>
	<body>
		<div id="global_content">
			<div class="images">
				<center>
					<div class="pane">
						<center>
							<a href="product.php?id=1">
								<img class="image" src="http://i.imgur.com/lBejnWh.jpg">
							</a>
							<div class="text">
								<br />
								<a class="car" href="product.php?id=1">Lee</a>
							</div>
							<br />
						</center>
					</div>
					<div class="pane">
						<center>
							<a href="product.php?id=2">
								<img class="image" src="http://i.imgur.com/z4E0ajo.jpg">
							</a>
							<br />
							<div class="text">
								<br />
								<a class="car" href="product.php?id=2">Rolihlahla</a>
							</div>
							<br />
						</center>
					</div>
				</center>
			</div>
			<div class="images">
				<center>
					<div class="pane">
						<center>
							<a href="product.php?id=4">
								<img class="image" src="http://i.imgur.com/pOgzCkn.jpg">
							</a>
							<div class="text">
								<br />
								<a class="car" href="product.php?id=4">Paul</a>
							</div>
							<br />
						</center>
					</div>
					<div class="pane">
						<center>
							<a href="product.php?id=6">
								<img class="image" src="http://i.imgur.com/Ub1vcLw.jpg">
							</a>
							<br />
							<div class="text">
								<br />
								<a class="car" href="product.php?id=6">Koffi</a>
							</div>
							<br />
						</center>
					</div>
				</center>
			</div>
			<div class="images">
				<center>
					<div class="pane">
						<center>
							<a href="product.php?id=3">
								<img class="image" src="http://i.imgur.com/wjFxO2H.jpg">
							</a>
							<div class="text">
								<br />
								<a class="car" href="product.php?id=3">Sophie</a>
							</div>
							<br />
						</center>
					</div>
					<div class="pane">
						<center>
							<a href="product.php?id=5">
								<img class="image" src="http://i.imgur.com/4kucVZq.jpg">
							</a>
							<br />
							<div class="text">
								<br />
								<a class="car" href="product.php?id=5">Wang</a>
							</div>
							<br />
						</center>
					</div>
				</center>
			</div>
		</div>
		<?php include("header.php") ?>
	</body>
</html>
