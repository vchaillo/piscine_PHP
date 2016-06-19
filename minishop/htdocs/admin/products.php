<?php

include("../header.php");
include("../includes/db_connect.php");
include("../includes/product.php");

if (!isset($_SESSION['lvl']) || $_SESSION['lvl'] == 0)
    header('Location: /index.php');

$db = db_connect();
$products = get_all_products($db);

?>

<div class="bloc">
	<h1>Products list</h1>
	<?php
        while ($product = mysqli_fetch_assoc($products))
        {
            echo '<div class="car">';
            echo '<h4>' . $product['name'] . '</h4>';
            echo '<img src="' . $product['image'] . '">';
            echo '<p>Price : ' . $product['price'] . '$</p>';
            echo '</div>';
        }
	?>
</div>

</body></html>