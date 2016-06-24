<?php

if (isset($_GET['str']) && $_GET['str'] != '') {
	file_put_contents('list.csv', $_GET['str'] . PHP_EOL, FILE_APPEND);
}

?>