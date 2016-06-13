<?PHP
session_start();
$_SESSION["login"] = NULL;
$_SESSION["password"] = NULL;
$_SESSION["lvl"] = NULL;
$_SESSION["cart"] = NULL;
$_SESSION["qte"] = NULL;
header('Location: index.php')
?>
