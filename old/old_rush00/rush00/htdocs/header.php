		<div id="header">
			<a href="index.php">
				<img id="home_button" src="img/home.png">
			</a>
			<a href="cart.php">
				<img id="cart_button" src="img/cart.png">
			</a>
			<a id="categ" class="link" href="categorie.php">
				Categories
			</a>
			<?php
			if (isset($_SESSION["login"])) {?>
				<a id="sign_out" class="link" href="logout.php">
					Logout
				</a>
			<?PHP } ?>
			<?php
			if (!isset($_SESSION["login"])) {?>
			<a id="sign_in" class="link" href="signin.php">
				Sign in
			</a>
			<a id="sign_up" class="link" href="signup.php">
				Sign up
			</a>
			<?php } ?>
		</div>