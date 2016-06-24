<?php

if (isset($_GET['id']) && $_GET['id'] != '') {

	$content = file_get_contents('list.csv');
	$lines = explode(PHP_EOL, $content);

	foreach ($lines as $key => $todo) {
		$pair = explode(';', $todo);
		echo $key . PHP_EOL;
		if ($pair[0] == $_GET['id']) {
			unset($lines[$key]);
			$new_content = implode(PHP_EOL, $lines);
			file_put_contents('list.csv', $new_content);
			break;
		}
	}
}

?>