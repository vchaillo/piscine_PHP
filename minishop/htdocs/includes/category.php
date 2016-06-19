<?php

function	get_products_from_cat($db, $cat)
{
    $query = "SELECT * FROM Product WHERE categorie ='" . $cat . "'";
    if ($result = mysqli_query($db, $query))
    	return ($result);
}

?>