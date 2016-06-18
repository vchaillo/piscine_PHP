<?php

include("header.php");
include("includes/db_connect.php");
include("includes/product.php");

$db = db_connect();
if ($_GET["id"] and $_GET["id"] != '')
{
    $product = get_product($db, $_GET["id"]);
    if ($_GET["action"] == "plus")
        add_to_cart($product);
    else if ($_GET["action"] == "minus")
        delete_from_cart($product);
    else if ($_GET["action"] == "trash")
        delete_all_from_cart($product);
}
?>

<div class="bloc">
    <table>
        <tr class="text">
            <th class="first">Article</th>
            <th>Price</th>
            <th>Quantity</th>
            <th class="last">Total</th>
        </tr>
        <?php
        foreach ($_SESSION["cart"] as $key => $id) {
            $product = get_product($db, $id);
            ?>
            <tr class="text">
			<?PHP
            echo '<td class="first">' . $product['name'] . '</td>';
            echo '<td>' . $product['price'] . '</td>';
            echo '<td>' . $_SESSION["qte"][$key] . '<a href="/cart.php?action=minus&id=' . $product['id'] . '"><i class="fa fa-minus btn"></i><a href="/cart.php?action=plus&id=' . $product['id'] . '"><i class="fa fa-plus btn"></i></td>';
            echo '<td>' . $product['price']*$_SESSION["qte"][$key] . '<a href="/cart.php?action=trash&id=' . $product['id'] . '"><i class="fa fa-trash btn"></i>';
            ?>
            </tr>
        <?PHP } ?>
    </table>
    <div>
        <input id="pay" type="submit" name="submit" value="Pay now" />
    </div>
</div>

</body></html>
