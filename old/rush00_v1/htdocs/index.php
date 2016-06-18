<?php
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
				<center>
					<div class="pane">
						<center>
							<img class="image" src="http://i.imgur.com/FcqcK00.jpg">
							<div class="text">
								<br />
								<a class="car" href="product.php?id=13">Lamborghini Countach</a>
							</div>
							<br />
						</center>
					</div>
					<div class="pane">
						<center>
							<img class="image" src="http://i.imgur.com/3wMt3lK.jpg">
							<br />
							<div class="text">
								<br />
								<a class="car" href="product.php?id=16">Mclaren P1</a>
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
							<img class="image" src="http://i.imgur.com/1KqrgW0.jpg">
							<div class="text">
								<br />
								<a class="car" href="product.php?id=14">Lamborghini Gallardo</a>
							</div>
							<br />
						</center>
					</div>
					<div class="pane">
						<center>
							<img class="image" src="http://i.imgur.com/W3ApZAk.jpg">
							<br />
							<div class="text">
								<br />
								<a class="car" href="product.php?id=12">Jaguar F Type</a>
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
							<img class="image" src="http://i.imgur.com/wsNtQ2i.jpg">
							<div class="text">
								<br />
								<a class="car" href="product.php?id=5">Chevrolet Corvette Z06</a>
							</div>
							<br />
						</center>
					</div>

					<div class="pane">
						<center>
							<img class="image" src="http://i.imgur.com/gmUuNzQ.jpg">
							<br />
							<div class="text">
								<br />
								<a class="car" href="product.php?id=4">Bugatti Veyron</a>
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
