<?php
include("header.php");
include("db_connect.php");

$db = db_connect();
if ($_POST["login"] and $_POST["passwd"] and $_POST["submit"] == "Connect")
{
    $query = "SELECT * FROM User WHERE login ='" . $_POST['login'] . "'";
    if ($result = mysqli_query($db, $query))
    {
        $salt = hash("whirlpool", "RhvFgdo7HdwW");
        $password = hash("whirlpool", $_POST["passwd"]);
        $secure_password = $salt.$password;
        $row = mysqli_fetch_assoc($result);
        if ($row["passwd"] == $secure_password) 
        {
            echo $secure_password . PHP_EOL;
            echo $row['passwd'] . PHP_EOL;
            $_SESSION["login"] = $_POST["login"];
            $_SESSION["password"]= $_POST["passwd"];
            if ($row["login"] == "admin")
                $_SESSION["lvl"] = 1;
            else
                $_SESSION["lvl"] = 0;
            // header('Location: index.php');
            exit ;
        }
    }
    else {
        echo "Yooooooooo";
        header('Location: http://e2r3p5.42.fr:8080/minishop/login.php?error=loginfailed');
    }
}
?>

    <div class="bloc">
        <h1>Connection</h1>
        <?php
            foreach ($_GET as $value => $name) {
                if ($value == "error" and $name == "loginfailed") {
                    echo '<html><body><p class="text">Bad login or password</p></body></html>';
                }
            }
        ?>
        <form action="login.php" method="POST">
            <label for="login">Login</label>
            <br>
            <input required type="text" name="login" />
            <br>
            <label for="passwd">Password</label>
            <br>
            <input required type="password" name="passwd" />
            <br>
            <input type="submit" name="submit" value="Connect" />
        </form>
    </div>

</body></html>