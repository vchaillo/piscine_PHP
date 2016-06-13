<?php

	if (isset($_POST["submit"]) && isset($_POST["login"]) && isset($_POST["oldpw"]) && isset($_POST["newpw"])
		&& $_POST["submit"] === "OK" && $_POST["submit"] !== "" && $_POST["login"] !== "" && $_POST["oldpw"] !== "" && $_POST["newpw"] !== "")	
	{
		$array = array();
		if (file_exists("../private/passwd"))
		{
			$file = file_get_contents("../private/passwd");
			$array = unserialize($file);
		}

		$salt = hash("whirlpool", "RhvFgdo7HdwW");
		$old_pass = hash("whirlpool", $_POST["oldpw"]);
		$new_pass = hash("whirlpool", $_POST["newpw"]);
		$secure_old_pass = $salt.$old_pass;
		$secure_new_pass = $salt.$new_pass;
		$account = array("login" => $_POST['login'], "passwd" => $secure_new_pass);
		$exist = false;
		foreach($array as $key => $elem)
		{
			if ($elem["login"] === $account["login"])
			{
				if ($elem["passwd"] == $secure_old_pass)
				{
					$exist = true;
					$array[$key]["passwd"] = $secure_new_pass;
				}
			}
		}
		if ($exist === false)
			echo "ERROR\n";
		else
		{
			$file = serialize($array);
			file_put_contents("../private/passwd", $file);
			echo "OK\n";
		}
	}
	else
	{
		echo "ERROR\n";
	}

?>
