<?php

include("../header.php");
include("../includes/db_connect.php");
include("../includes/user.php");

if (!isset($_SESSION['lvl']) || $_SESSION['lvl'] == 0)
    header('Location: /index.php');

$db = db_connect();
if ($_GET['id'] && $_GET['action'] == 'delete')
	$success_users = delete_user($db, $_GET['id']);
if ($_GET['success'])
	$success_users = $_GET['success'];

$users = get_all_users($db);

?>

<div class="bloc">
	<h1>Users list</h1>
    <?php echo $success_users; ?>
	<ul>
		<?php
			while ($user = mysqli_fetch_assoc($users))
	        {
	            echo '<li>';
	            echo '<a href="/admin/user_edit.php?id=' . $user['id'] . '">' . $user['login'] . '</a>';
	            echo '<a href="/admin/users.php?action=delete&id=' . $user['id'] . '"><i class="fa fa-trash btn"></i>';
	            echo '</li>';
	        }
		?>
	</ul>
</div>

</body></html>