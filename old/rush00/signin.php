<?PHP
session_start();
$username = "root";
$passwd = "12345";
$dbname = "babyshop";

$login = $_POST["login"];
$babyshop = mysqli_connect("127.0.0.1", $username, $passwd, $dbname);
if ($_POST["login"] and $_POST["passwd"] and $_POST["submit"] == "Connect")
{
    $result = mysqli_query($babyshop, "SELECT * FROM User");
    while ($row = mysqli_fetch_assoc($result))
	{
		$salt = hash("whirlpool", "RhvFgdo7HdwW");
		$password = hash("whirlpool", $_POST["passwd"]);
		$secure_password = $salt.$password;
        if ($row["login"] == $_POST["login"] and $row["passwd"] == $secure_password) 
        {
            $_SESSION["login"] = $login;
            $_SESSION["password"]= $_POST["passwd"];
            if ($row["login"] == "admin")
            {
                $_SESSION["lvl"] = 1;
            }
            else
            {
                $_SESSION["lvl"] = 0;
            }
            header('Location: index.php');
            exit ;
        }
    }
    header('Location: http://rush00.local.42.fr:8080/signin.php?error=loginfailed');
}
?>

<html>
    <head>
        <title>MiniShop - Sign in</title>
        <meta charset="utf-8" />
        <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
        <link rel="icon" type="image/png" href="img/icon.png" />
    </head>
    <body>
    <div id="global_content">
        <?PHP
        foreach ($_GET as $value => $name) {
            if ($value == "error" and $name == "loginfailed") {
                echo '<html><body><p class="text">Bad login or password</p></body></html>';
            }
        }
        ?>
            <div id="required" class="text">
                * Required field
            </div>
            <form action="signin.php" method="POST">
                <div class="text">
                    * Account name : 
                    <div>
                        <input id="login" type="text" name="login" />
                    </div>
                </div>
                <br />
                <br />
                <br />
                <div class="text">
                    * Password : 
                    <div class="input">
                        <input id="password" type="password" name="passwd" />
                    </div>
                    <div>
                        <input id="connect" type="submit" name="submit" value="Connect" />
                    </div>
                </div>
                <br />
                <br />
                <br />
            </form>
        </div>
        <?php include("header.php") ?>
    </body> 
</html>
