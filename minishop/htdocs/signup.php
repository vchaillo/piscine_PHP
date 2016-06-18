<?php

include("header.php");
include("includes/db_connect.php");
include("includes/user_create.php");

$db = db_connect();
$create_error = user_create($db);

?>

<div class="bloc">
    <h1>Create your account</h1>
    <?php echo $create_error; ?>
    <form action="signup.php" method="POST">
        <label for="login">Nickname</label>
        <br>
        <input autofocus required type="text" name="login" />
        <br>
        <label for="passwd">Password</label>
        <br>
        <input required type="password" name="passwd" />
        <br>
        <label for="passwd2">Repeat password</label>
        <br>
        <input required type="password" name="passwd2" />
        <br>
        <input type="submit" name="submit" value="Create account" />
    </form>
</div>

</body></html>