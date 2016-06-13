<?php
session_start();
include("function.php");
?>

<html>
    <head>
        <title>MiniShop - Cart</title>
        <meta charset="utf-8" />
        <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
        <link rel="icon" type="image/png" href="img/icon.png" />
    </head>
    <body>
        <div id="global_content">
            <center>
                <table>
                    <tr class="text">
                        <th class="first">Article</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th class="last">Total</th>
                    </tr>
                    <?php
                    foreach ($_SESSION["cart"] as $id) {
                        ?>
                        <tr class="text">
                        <?PHP
                        echo '<td class="first">'.get_name_by_id($id).'</td>';
                        echo '<td>'.get_price_by_id($id).'</td>';
                        ?>
                        <td>1</td>
                        <td class="last">coucou</td>
                        </tr>
                    <?PHP } ?>
                </table>
                <div>
                    <input id="pay" type="submit" name="submit" value="Pay now" />
                </div>
            </center>
        </div>
        <?php include("header.php") ?>
    </body>	
</html>