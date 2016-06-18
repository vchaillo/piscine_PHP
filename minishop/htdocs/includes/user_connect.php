<?php

function	user_connect($db)
{
	if ($_POST["login"] and $_POST["passwd"] and $_POST["submit"] == "Connect")
	{
	    $query = "SELECT * FROM User WHERE login ='" . $_POST['login'] . "'";
	    if ($result = mysqli_query($db, $query))
		{
		    $salt = hash("whirlpool", "RhvFgdo7HdwW");
		    $password = hash("whirlpool", $_POST["passwd"]);
		    $secure_password = $salt.$password;
		    $row = mysqli_fetch_assoc($result);
		    if ($row["passwd"] == $secure_password) 
		    {
	            $_SESSION["id"] = $row["id"];
	            if ($row["login"] == "admin")
	            {
	                $_SESSION["lvl"] = 1;
            		header('Location: /admin/index.php');
	            }
	            else
	            {
	                $_SESSION["lvl"] = 0;
            		header('Location: /index.php');
	            }
	            exit ;
	        }
	    }
	    return ('<html><body><p class="error">Bad login or password</p></body></html>');
	}
}

?>