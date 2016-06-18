<?php

include("../header.php");
include("../includes/db_connect.php");
include("../includes/product.php");

$db = db_connect();
if ($_GET["id"] and $_GET["id"] != '')
{
	$product = get_product($db, $_GET["id"]);
	// if ($_POST["submit"] == "Add to cart")
	// 	add_to_cart($product);
}

?>

<div class="bloc product">
    <h1>Edit</h1>
    <h2><?php echo $product['name'] ?></h2>
    <img src="<?php echo $product['image'] ?>">
    <h4>Price : <?php echo $product['price'] ?>$</h4>
    <p><?php echo utf8_decode($product['description']) ?></p>
    <form action="product.php?id=<?php echo $product['id'] ?>" method="POST">
		<input type="submit" name="submit" value="Add to cart" />
    </form>
</div>

</body></html>