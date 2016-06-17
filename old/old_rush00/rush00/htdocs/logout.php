<?PHP
session_start();
$_SESSION["login"] = NULL;
$_SESSION["password"] = NULL;
$_SESSION["lvl"] = NULL;
header('Location: index.php')
?>