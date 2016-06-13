#!/usr/bin/php
<?php

if ($argc > 2)
{
	unset($argv[0]);
	$key = $argv[1];
	unset($argv[1]);
	foreach ($argv as $elem)
	{
		$tab = explode(":", $elem);
		if ($tab[0] == $key)
			echo $tab[1] . PHP_EOL;
	}
}

?>
