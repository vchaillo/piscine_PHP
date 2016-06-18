<?php

function db_connect()
{
    $username = "root";
    $passwd = "123456";
	$dbname = "db_shop";

	$db = mysqli_connect("127.0.0.1", $username, $passwd, $dbname);
	return $db;
}

?>