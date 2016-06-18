<?php

function db_connect()
{
    $username = "root";
    $passwd = "root";
	$dbname = "db_shop";

	$db = mysqli_connect("localhost", $username, $passwd, $dbname);
	return $db;
}

?>