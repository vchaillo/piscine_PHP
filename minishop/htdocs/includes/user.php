<?php

function	get_all_users($db)
{
    $query = "SELECT * FROM User";
    if ($result = mysqli_query($db, $query))
    	return ($result);
}

function	get_user($db, $id)
{
    $query = "SELECT * FROM User WHERE id ='" . $id . "'";
    if ($result = mysqli_query($db, $query))
    {
	    $user = mysqli_fetch_assoc($result);
		return($user);
    }
}

function	update_user($db, $id)
{
    $query = "UPDATE User SET login='" . $_POST['login'] . "' WHERE id ='" . $id . "'";
    if ($result = mysqli_query($db, $query))
    	return ("<p class='success'>User " . $id . " was updated</p>");
    else {
		echo "Error update : " . mysqli_error($db) . "\n";
	}
}

function	delete_user($db, $id)
{
	if ($id != 1)
	{
	    $query = "DELETE FROM User WHERE id ='" . $id . "'";
	    if ($result = mysqli_query($db, $query))
	    	return ("<p class='success'>User " . $id . " was deleted</p>");
	    else {
			echo "Error delete : " . mysqli_error($db) . "\n";
		}
	}
	else
	    return ("<p class='error'>Impossible to delete admin</p>");
}

?>