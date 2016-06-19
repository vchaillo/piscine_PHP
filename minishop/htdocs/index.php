<?php

include("header.php");
include("includes/db_connect.php");
include("includes/product.php");

$db = db_connect();
$products = get_all_products($db);

?>

<div class="bloc">
    <h1>Welcome on shop</h1>
    <div class="cat">
        <a href="/category.php?cat=ASTON_MARTIN"><h4 class="brand">Aston Martin</h4></a>
        <a href="/category.php?cat=AUDI"><h4 class="brand">Audi</h4></a>
        <a href="/category.php?cat=BUGATTI"><h4 class="brand">Bugatti</h4></a>
        <a href="/category.php?cat=CHEVROLET"><h4 class="brand">Chevrolet</h4></a>
        <a href="/category.php?cat=FERRARI"><h4 class="brand">Ferrari</h4></a>
        <a href="/category.php?cat=FORD"><h4 class="brand">Ford</h4></a>
        <a href="/category.php?cat=ROLCE_ROYCE"><h4 class="brand">Rolce Royce</h4></a>
        <a href="/category.php?cat=JAGUAR"><h4 class="brand">Jaguar</h4></a>
        <a href="/category.php?cat=LAMBORGHINI"><h4 class="brand">Lamborghini</h4></a>
        <a href="/category.php?cat=MCLAREN"><h4 class="brand">Mclaren</h4></a>
        <a href="/category.php?cat=MASERATI"><h4 class="brand">Maserati</h4></a>
        <a href="/category.php?cat=MERCEDES"><h4 class="brand">Mercedes</h4></a>
        <a href="/category.php?cat=NISSAN"><h4 class="brand">Nissan</h4></a>
        <a href="/category.php?cat=PAGANI"><h4 class="brand">Pagani</h4></a>
        <a href="/category.php?cat=PORSCHE"><h4 class="brand">Porsche</h4></a>
    </div>
    <?php
        while ($product = mysqli_fetch_assoc($products))
        {
            echo '<a href="/product.php?id=' . $product['id'] . '"><div class="car">';
            echo '<h4>' . $product['name'] . '</h4>';
            echo '<img src="' . $product['image'] . '">';
            echo '<p>Price : ' . $product['price'] . '$</p>';
            echo '</div>';
        }
    ?>
</div>


</body></html>