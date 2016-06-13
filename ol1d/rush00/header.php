<div id="header">
			<a id="home_button" href="index.php">HOME</a>
			<a id="cart_button" href="cart.php">CART</a>
<div id="banner"><a id="categ" href="categorie.php">
				CATEGORIES</a></div>
<?php
if (isset($_SESSION["login"])) {?>
				<a id="sign_out" sign href="logout.php">
					LOGOUT
				</a>
			<?PHP } ?>
<?php
	if (!isset($_SESSION["login"])) {?>
			<a id="sign_in" href="signin.php">
				LOG IN
			</a>
			<a id="sign_up" href="signup.php">
				SIGN UP
			</a>
			<?php } ?>
	</div>
