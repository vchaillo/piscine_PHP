<?php

session_start();
include("header.php");
include("includes/db_connect.php");
include("includes/product.php");

$db = db_connect();
if ($_GET["id"] and $_GET["id"] != '')
{
	$product = get_product($db, mysqli_real_escape_string($db, $_GET["id"]));
	if ($_POST["submit"] == "Add to cart")
		add_to_cart($product);
}

?>

<div class="bloc product">
    <h2><?php echo $product['name'] ?></h2>
    <h4>Brand : <?php echo '<a href="/minishop/category.php?cat=' . $product['categorie'] . '">' . $product['categorie'] . '</a>' ?></h4>
    <img src="<?php echo $product['image'] ?>">
    <h4>Price : <?php echo $product['price'] ?>$</h4>
    <p><?php echo $product['description'] ?></p>
    <form action="/minishop/product.php?id=<?php echo $product['id'] ?>" method="POST">
		<input type="submit" name="submit" value="Add to cart" />
    </form>
</div>

</body></html>