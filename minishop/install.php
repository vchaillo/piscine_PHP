<?php

include("db_connect.php");

function	create_db()
{
	$mysql = mysqli_connect("127.0.0.1", 'root', 'root');
	if (!$mysql) {
	    die("Connection failed: " . mysqli_connect_error() . "\n");
		return (0);
	}
	else
	{
		// Creation of database
		$sql = "CREATE DATABASE db_shop";
		if (mysqli_query($mysql, $sql)) {
		    echo "Database created successfully\n";
		    return (1);
		} else {
		    echo "Error creating database: " . mysqli_error($db) . "\n";
		    return (0);
		}
		mysqli_close($mysql);
	}
}

$db = db_connect();
if (create_db() || $db)
{
	$db = db_connect();
	if (!$db)
	    die("Connection failed: " . mysqli_connect_error() . "\n");
	else
	{
		// Creation of table user
		$sql = "CREATE TABLE User (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			login VARCHAR(30) NOT NULL UNIQUE,
			passwd VARCHAR(512) NOT NULL,
			cart_id INT(6) UNSIGNED)";
		if (mysqli_query($db, $sql)) {
		    echo "Table User created successfully\n";
		} else {
		    echo "Error creating table: " . mysqli_error($db) . "\n";
		}
		$salt = hash("whirlpool", "RhvFgdo7HdwW");
		$passwd = hash("whirlpool", "ADMIN");
		$password = $salt.$passwd;
		$sql = "INSERT INTO User (login, passwd) VALUES (
			'admin',
			'$password')";
		if (mysqli_query($db, $sql)) {
		    echo "Admin user created successfully\n";
		} else {
		    echo "Error creating admin user: " . mysqli_error($db) . "\n";
		}
		$sql = "CREATE TABLE Product (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(30) NOT NULL,
			categorie VARCHAR(30) NOT NULL,
			image VARCHAR(130) NOT NULL,
			description TEXT(1000) NOT NULL,
			price INT(6) NOT NULL)";
		if (mysqli_query($db, $sql)) {
		    echo "Table Users created successfully\n";
		} else {
		    echo "Error creating table: " . mysqli_error($db) . "\n";
		}
	}
}

?>