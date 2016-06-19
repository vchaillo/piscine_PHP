<?php

include("../header.php");
include("../includes/db_connect.php");
include("../includes/command.php");
include("../includes/product.php");
include("../includes/user.php");

if (!isset($_SESSION['lvl']) || $_SESSION['lvl'] == 0)
    header('Location: /index.php');

$db = db_connect();
$commands = get_all_commands($db);

?>

<div class="bloc">
	<h1>Commands list</h1>
	<ul>
		<?php
			while ($command = mysqli_fetch_assoc($commands))
	        {
				$products = explode(' ', $command['products']);
	        	$user = get_user($db, $command['user_id']);
	            echo '<li>';
	            echo $user['login'];
	            echo ' -';
	            foreach ($products as $value)
	            {
	            	$tab = explode('*', $value);
		            $product = get_product($db, $tab[0]);
		            echo ' ';
		            echo $product['name'] . ' * ' . $tab[1];
	            }
	            echo ' - ';
	            echo 'Price : ' . $command['total'];
	            echo '</li>';
	        }
		?>
	</ul>
</div>

</body></html>