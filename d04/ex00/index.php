<?php
	session_start();
	
	if ($_GET["submit"] === "OK")
	{
		if (isset($_GET["login"]))
			$_SESSION["login"] = $_GET["login"];
		if (isset($_GET["passwd"]))
			$_SESSION["passwd"] = $_GET["passwd"];
		if(!(isset($_SESSION["login"])))
			$login = "";
		if(!(isset($_SESSION["passwd"])))
			$passwd = "";
	}

?>

<html>
	<body>
		<form action="index.php" method="get">
		Identifiant: <input type="text" name="login" value="<?=$_SESSION['login']?>"/>
		Mot de passe: <input type="password" name="passwd" value="<?=$_SESSION['passwd']?>" />
			<input type="submit" name="submit" value="OK"/>
		</form>
	</body>
</html>
