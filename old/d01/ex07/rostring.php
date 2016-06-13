#!/usr/bin/php
<?php

$clean_str = trim ($argv[1]);
$count = 1;

while ($count != 0)
{
	$clean_str = str_replace("  ", " ", $clean_str, $count);
}


$str = explode(" ", $clean_str);
$s = $str[0];
unset($str[0]);
foreach ($str as $elem)
{
	echo($elem . " ");
}
echo($s);


?>
