<?php

	$cookie = $_GET;
	if ($cookie["action"] === "set")
	{
		setcookie($cookie["name"], $cookie["value"], time()+3600);
	}
	else if ($cookie["action"] === "get")
	{
		if ($_COOKIE[$cookie["name"]])
		{
			echo $_COOKIE[$cookie["name"]] . "\n";
		}
	}
	else if ($cookie["action"] === "del")
	{
		setcookie($cookie["name"]);
	}

?>
