<?php

include("header.php");
include("includes/db_connect.php");
include("includes/user_connect.php");

$db = db_connect();
$login_error = user_connect($db);

?>

<div class="bloc">
    <h1>Connection</h1>
    <?php echo $login_error; ?>
    <form action="login.php" method="POST">
        <label for="login">Nickname</label>
        <br>
        <input autofocus required type="text" name="login" />
        <br>
        <label for="passwd">Password</label>
        <br>
        <input required type="password" name="passwd" />
        <br>
        <input type="submit" name="submit" value="Connect" />
    </form>
</div>

</body></html>