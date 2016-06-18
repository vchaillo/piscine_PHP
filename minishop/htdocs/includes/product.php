<?php

function	get_all_products($db)
{
    $query = "SELECT * FROM Product";
    if ($result = mysqli_query($db, $query))
    	return ($result);
}

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

function	delete_from_cart($product)
{
	foreach ($_SESSION["cart"] as $key => $elem)
	{
		if ($elem == $product['id'])
		{
			$pos = $key;
		}
	}
	$_SESSION["qte"][$pos] -= 1;
	if ($_SESSION["qte"][$pos] == 0)
	{
		unset($_SESSION["qte"][$pos]);
		unset($_SESSION["cart"][$pos]);
	}
}

function	delete_all_from_cart($product)
{
	foreach ($_SESSION["cart"] as $key => $elem)
	{
		if ($elem == $product['id'])
		{
			$pos = $key;
		}
	}
	unset($_SESSION["qte"][$pos]);
	unset($_SESSION["cart"][$pos]);
}

?>