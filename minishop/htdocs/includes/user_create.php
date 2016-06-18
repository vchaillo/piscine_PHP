<?php

function    user_create($db)
{
    if ($_POST["login"] and $_POST["passwd"] and $_POST["passwd"] == $_POST["passwd2"] and $_POST["submit"] == "Create account")
    {
        $query = "SELECT * FROM User WHERE login ='" . $_POST['login'] . "'";
        if ($result = mysqli_query($db, $query))
        {
            $row = mysqli_fetch_assoc($result);
            if ($row["login"] == $_POST["login"])
                return ('<html><body><p class="error">Choose an another nickname</p></body></html>');
            else
            {
                $_SESSION["id"] = $_POST["login"];
                $_SESSION["lvl"] = 0;
                $salt = hash("whirlpool", "RhvFgdo7HdwW");
                $password = hash("whirlpool", $password);
                $secure_password = $salt.$password;
                $query = "INSERT INTO User (login, passwd) VALUES ('" . $_POST['login'] . "', '" . $secure_password . "')";
                mysqli_query($db, $query);
                header('Location: /index.php');
            }
        }
    }
    elseif ($_POST["login"] and $_POST["passwd"] and $_POST["passwd"] != $_POST["passwd2"])
        return ('<html><body><p class="error">Uncorrect passwords</p></body></html>');
}

?>