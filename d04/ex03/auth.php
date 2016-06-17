<?php

	function	auth($login, $passwd)
	{
		$array = array();
		if (!file_exists("../private"))
			mkdir("../private");
		if (file_exists("../private"))
		{
			$file = file_get_contents("../private/passwd");
			$array = unserialize($file);
		}

		foreach ($array as $user)
		{
			if (isset($user['login']) && $user['login'] == $login)
			{
				$salt = hash("whirlpool", "RhvFgdo7HdwW");
				$pass = hash("whirlpool", $passwd);
				$secure_pass = $salt.$pass;
				if ($user['passwd'] == $secure_pass)
					return (TRUE);
			}
		}
		return (FALSE);
}

?>
