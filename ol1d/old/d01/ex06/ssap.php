#!/usr/bin/php
<?PHP

$i = 0;
$count = 1;

if ($argc > 1)
{
	unset($argv[0]);
	$str = implode (" ", $argv);
	while ($count != 0)
	{
		$str = str_replace("  ", " ", $str, $count);
	}
	$tab = explode(" ", $str);
	array_multisort($tab, SORT_STRING);
	foreach ($tab as $elem)
		echo "$elem\n";
}

?>
