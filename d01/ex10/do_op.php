#!/usr/bin/php
<?php

if ($argc == 4)
{
	unset($argv[0]);
	$str = implode(" ", $argv);
	$str = trim($str);
	$count = 1;

	while ($count != 0)
	{
		$str = str_replace("  ", " ", $str, $count);
	}
	$tab = explode(" ", $str);
	if ($tab[1] == "+")
	{
		$res = $tab[0] + $tab[2];
	}
	else if ($tab[1] == "-")
	{
		$res = $tab[0] - $tab[2];
	}
	else if ($tab[1] == "*")
	{
		$res = $tab[0] * $tab[2];
	}
	else if ($tab[1] == "/")
	{
		$res = $tab[0] / $tab[2];
	}
	else if ($tab[1] == "%")
	{
		$res = $tab[0] % $tab[2];
	}
	echo "$res\n";
}
else
{
	echo "Incorrect Parameters\n";
}

?>
