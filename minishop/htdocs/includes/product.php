<?php

function	get_product($db, $id)
{
    $query = "SELECT * FROM Product WHERE id ='" . $id . "'";
    if ($result = mysqli_query($db, $query))
    {
	    $product = mysqli_fetch_assoc($result);
		return($product);
    }
}

function	add_to_cart($product)
{
	$find = false;
	foreach ($_SESSION["cart"] as $key => $elem)
	{
		if ($elem == $product['id'])
		{
			$find = true;
			$pos = $key;
		}
	}
	if ($find == true)
		$_SESSION["qte"][$pos] += 1;
	else
	{
		$_SESSION["cart"][] = $product['id'];
		$_SESSION["qte"][] = "1";
	}
}

?>