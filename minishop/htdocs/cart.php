<?php

include("header.php");
include("includes/db_connect.php");
include("includes/product.php");
include("includes/command.php");

$db = db_connect();
if ($_GET['total'] && $_SESSION['id'])
    $command_success = create_command($db, $_GET['total']);
else if ($_GET['total'])
    $command_error = '<p class="error">Please login or sign up</p>';

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
    <?php echo $command_success; ?>
    <?php echo $command_error; ?>
    <table>
        <tr class="text">
            <th class="first">Article</th>
            <th>Price</th>
            <th>Quantity</th>
            <th class="last">Total</th>
        </tr>
        <?php
        $total = 0;
        foreach ($_SESSION["cart"] as $key => $id) {
            $product = get_product($db, $id);
            $total += $product['price']*$_SESSION["qte"][$key];
            ?>
            <tr class="text">
			<?php
            echo '<td>' . $product['name'] . '</td>';
            echo '<td>' . $product['price'] . '$</td>';
            echo '<td>' . $_SESSION["qte"][$key] . '<a href="/cart.php?action=minus&id=' . $product['id'] . '"><i class="fa fa-minus btn"></i><a href="/cart.php?action=plus&id=' . $product['id'] . '"><i class="fa fa-plus btn"></i></td>';
            echo '<td>' . $product['price']*$_SESSION["qte"][$key] . '$<a href="/cart.php?action=trash&id=' . $product['id'] . '"><i class="fa fa-trash btn"></i>';
            ?>
            </tr>
        <?php
        }
        echo '<tr>';
        echo '<td class="void" colspan="3"></td>';
        echo '<td>' . $total . '$</td>';
        echo '</tr>';
        ?>
    </table>
    <div>
        <a href="/cart.php?total=<?php echo $total ?>"><input type="submit" name="total" value="Pay now" /></a>
    </div>
</div>

</body></html>
