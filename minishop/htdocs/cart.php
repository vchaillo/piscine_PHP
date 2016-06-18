<?php

include("header.php");
include("includes/db_connect.php");
include("includes/product.php");

$db = db_connect();

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
            echo '<td>' . $_SESSION["qte"][$key] . '</td>';
            echo '<td>' . $product['price']*$_SESSION["qte"][$key] . '</td>';
            ?>
            </tr>
        <?PHP } ?>
    </table>
    <div>
        <input id="pay" type="submit" name="submit" value="Pay now" />
    </div>
</div>

</body></html>
