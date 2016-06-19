<?php

function    user_create($db)
{
    if ($_POST["login"] and $_POST["passwd"] and $_POST["passwd"] == $_POST["passwd2"] and $_POST["submit"] == "Create account")
    {
        $query = "SELECT * FROM User WHERE login ='" . mysqli_real_escape_string($db, $_POST['login']) . "'";
        if ($result = mysqli_query($db, $query))
        {
            $row = mysqli_fetch_assoc($result);
            if ($row["login"] == $_POST["login"])
                return ('<html><body><p class="error">Choose an another nickname</p></body></html>');
            else
            {
                $query = "SELECT count(*) FROM User";
                $result = mysqli_query($db, $query);
                $count = mysqli_fetch_assoc($result);
                $id = $count['count'] + 1;
                $_SESSION["id"] = $id;
                $_SESSION["lvl"] = 0;
                $password = $_POST['passwd'];
                $salt = hash("whirlpool", "RhvFgdo7HdwW");
                $password = hash("whirlpool", $password);
                $secure_password = mysqli_real_escape_string($db, $salt.$password);
                $login = mysqli_real_escape_string($db, $_POST['login']);
                $query = "INSERT INTO User (login, passwd) VALUES ('" . $login . "', '" . $secure_password . "')";
                mysqli_query($db, $query);
                header('Location: /minishop/index.php');
            }
        }
    }
    elseif ($_POST["login"] and $_POST["passwd"] and $_POST["passwd"] != $_POST["passwd2"])
        return ('<html><body><p class="error">Uncorrect passwords</p></body></html>');
}

?>