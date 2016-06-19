<?php

include("header.php");
include("includes/db_connect.php");
include("includes/category.php");

$db = db_connect();
if ($_GET["cat"] and $_GET["cat"] != '')
	$products = get_products_from_cat($db, $_GET["cat"]);

?>

<div class="bloc category">
    <?php
    echo '<h1>' . $_GET["cat"] . '</h1>';
        while ($product = mysqli_fetch_assoc($products))
        {
            echo '<a href="/product?id=' . $product['id'] . '"><div class="car">';
            echo '<h4>' . $product['name'] . '</h4>';
            echo '<img src="' . $product['image'] . '">';
            echo '<p>Price : ' . $product['price'] . '$</p>';
            echo '</div></a>';
        }
    ?>
</div>

</body></html>