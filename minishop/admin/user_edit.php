<?php

session_start();
if (!isset($_SESSION['lvl']) || $_SESSION['lvl'] == 0)
    header('Location: /minishop/index.php');

include("../includes/db_connect.php");
include("../includes/user.php");

$db = db_connect();

if ($_GET["id"] and $_GET["id"] != '')
{
    $user = get_user($db, mysqli_real_escape_string($db, $_GET['id']));
    if ($_POST['submit'] == 'Edit')
        header('Location: /minishop/admin/users.php?success='. update_user($db, $_GET['id']));
}
include("../header.php");

?>

<div class="bloc">
	<h1>Edit user</h1>
	<form action="/minishop/admin/user_edit.php?id=<?php echo $user['id'] ?>" method="POST">
        <label for="login">Nickname</label>
        <br>
        <input autofocus required type="text" name="login" value="<?php echo $user['login'] ?>" />
        <br>
        <input type="submit" name="submit" value="Edit" />
    </form>
</div>

</body></html>