#!/usr/bin/php
<?php

$count = 1;

if ($argc > 1)
{
	unset($argv[0]);
	$str = implode(" ", $argv);
	$str = trim($str);
	while ($count != 0)
	{
		$str = str_replace("  ", " ", $str, $count);
	}
	$tab = explode(" ", $str);
	foreach($tab as &$elem)
	{
		if (is_numeric($elem))
		{
			$num_tab[] = $elem;
		}
		else if (ctype_alpha($elem))
		{
			$alpha_tab[] = $elem;
		}
		else
		{
			$spe_tab[] = $elem;
		}
	}
	sort($alpha_tab, SORT_STRING | SORT_FLAG_CASE);
	sort($num_tab, SORT_STRING | SORT_FLAG_CASE);
	sort($spe_tab, SORT_STRING | SORT_FLAG_CASE);
	foreach($alpha_tab as $elem)
		echo "$elem\n";
	foreach($num_tab as $elem)
		echo "$elem\n";
	foreach($spe_tab as $elem)
		echo "$elem\n";
}

?>
