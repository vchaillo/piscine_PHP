<?php

function    get_all_commands($db)
{
    $query = "SELECT * FROM Command";
    if ($result = mysqli_query($db, $query))
        return ($result);
}

function	create_command($db, $total)
{
    foreach ($_SESSION["cart"] as $key => $id)
    {
    	if ($str != '')
    		$str = $str . ' ';
    	$str = $str . $id . '*' . $_SESSION["qte"][$key];
    }
    $query = "INSERT INTO Command (user_id, products, total) VALUES (" . $_SESSION['id'] . ", '" . $str . "', '" . $total . "')";
    if (mysqli_query($db, $query))
    {
   		unset($_SESSION["cart"]);
		unset($_SESSION["qte"]);
    	return ("<p class='success'>Thank you for your purchase</p>");
    }
    else {
		    echo "Error creating : " . mysqli_error($db) . "\n";
		}
}

?>