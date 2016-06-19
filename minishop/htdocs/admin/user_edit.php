<?php

include("../header.php");
include("../includes/db_connect.php");
include("../includes/user.php");

if (!isset($_SESSION['lvl']) || $_SESSION['lvl'] == 0)
    header('Location: /index.php');

$db = db_connect();

if ($_GET["id"] and $_GET["id"] != '')
{
	$user = get_user($db, $_GET['id']);
	if ($_POST['submit'] == 'Edit')
    	header('Location: /admin/users.php?success='. update_user($db, $_GET['id']));
}

?>

<div class="bloc">
	<h1>Edit user</h1>
	<form action="/admin/user_edit.php?id=<?php echo $user['id'] ?>" method="POST">
        <label for="login">Nickname</label>
        <br>
        <input autofocus required type="text" name="login" value="<?php echo $user['login'] ?>" />
        <br>
        <input type="submit" name="submit" value="Edit" />
    </form>
</div>

</body></html>