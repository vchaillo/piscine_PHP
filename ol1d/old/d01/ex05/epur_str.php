#!/usr/bin/php
<?PHP

$str = trim($argv[1]);
$count = 1;

while ($count != 0)
{
	$str = str_replace("  ", " ", $str, $count);
}
if ($argc == 2)
	echo $str . "\n";

?>
