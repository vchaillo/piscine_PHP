<?php

	if (isset($_POST["submit"]) && isset($_POST["login"]) && isset($_POST["passwd"])
		&& $_POST["submit"] === "OK" && $_POST["submit"] !== "" && $_POST["login"] !== "" && $_POST[passwd] !== "")	
	{
		if (!file_exists("../private"))
			mkdir("../private");
		$array = array();
		if (file_exists("../private/passwd"))
		{
			$file = file_get_contents("../private/passwd");
			$array = unserialize($file);
		}
		$salt = hash("whirlpool", "RhvFgdo7HdwW");
		$pass = hash("whirlpool", $_POST["passwd"]);
		$secure_pass = $salt.$pass;
		$account = array("login" => $_POST['login'], "passwd" => $secure_pass);
		$exist = false;
		foreach($array as $elem)
		{
			if ($elem["login"] === $account["login"])
				$exist = true;
		}
		if ($exist === false)
		{
			$array[] = $account;
			echo "OK\n";
		}
		else
		{
			echo "ERROR\n";
		}
		$file = serialize($array);
		file_put_contents("../private/passwd", $file);
	}
	else
	{
		echo "ERROR\n";
	}

?>
