#!/usr/bin/php
<?php

if ($argc == 2)
{
	unset($argv[0]);
	$str = implode($argv);
	$str = trim($str);
	$count = 1;

	$str = str_replace("+", " + ", $str);
	$str = str_replace("-", " - ", $str);
	$str = str_replace("*", " * ", $str);
	$str = str_replace("/", " / ", $str);
	$str = str_replace("%", " % ", $str);
	while ($count != 0)
		$str = str_replace("  ", " ", $str, $count);

	$tab = explode(" ", $str);

	if (is_numeric($tab[0]) && is_numeric($tab[2]) && ($tab[1] == "+" || $tab[1] == "-" || $tab[1] == "*" || $tab[1] == "/" || $tab[1] == "%"))
	{
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
			if ($tab[2] == "0")
				$res = "Invalid division by zero";
			else
				$res = $tab[0] / $tab[2];
		}
		else if ($tab[1] == "%")
		{
			$res = $tab[0] % $tab[2];
		}
		echo "$res\n";
	}
	else
		echo "Syntax Error\n";
}
else
	echo "Incorrect Parameters\n";

?>
