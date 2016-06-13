<?PHP
session_start();
$username = "root";
$passwd = "12345";
$dbname = "minishop";

$minishop = mysqli_connect("127.0.0.1", $username, $passwd, $dbname);
$login = $_POST["login"];
$password = $_POST["passwd"];
if ($_POST["login"] and $_POST["passwd"] and $_POST["passwd"] == $_POST["passwd2"] and $_POST["submit"] == "Create new account")
{
    $result = mysqli_query($minishop, "SELECT * FROM User");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $cart_id = $row["cart_id"];
            if ($row["login"] == $_POST["login"]) {
                mysqli_close();
                header("Location: http://rush00.local.42.fr:8080/signup.php?error=login-exist");
                exit ;
            }
        }
    }
    $_SESSION["login"] = $login;
    $_SESSION["password"] = $password;
    $_SESSION["lvl"] = 0;
	mysqli_query($minishop, "INSERT INTO User (login, passwd, cart_id) VALUES ('$login','$password','$cart_id + 1')");
    header('Location: http://rush00.local.42.fr:8080/index.php?pseudo='. $login);
}
else if ((!$_POST["login"] or !$_POST["passwd"] or $_POST["passwd"] != $_POST["passwd2"]) and $_POST["submit"] == "Create new account")
    header('Location: http://rush00.local.42.fr:8080/signup.php?error=nofield');
?>

<html>
    <head>
        <title>MiniShop - Sign up</title>
        <meta charset="utf-8" />
        <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
        <link rel="icon" type="image/png" href="img/icon.png" />
    </head>
    <body>
    <div id="global_content">
	<?PHP
        foreach ($_GET as $value => $name) {
            if ($value == "error" and $name == "login-exist") {
                echo    '<html><body><p class="text">Login already exist</p></body></html>';
            }
            else if ($value == "error" and $name == "nofield") {
                echo    '<html><body><p class="text">Please complete all fields</p></body></html>'; 
            }
        }
    ?>
        <div id="required" class="text">
            * Required field
        </div>
            <form action="signup.php" method="POST">
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
                </div>
                <br />
                <br />
                <br />
                <div class="text">
                    * Confirm Password :
                    <div class="input">
                        <input id="confirm" type="password" name="passwd2" />
                    </div>
                    <div>
                    <input id="connect" type="submit" name="submit" value="Create new account" />
                    </div>
                </div>
            </form>
        </div>
        <?php include("header.php") ?>
    </body> 
</html>