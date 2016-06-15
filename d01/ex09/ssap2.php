#!/usr/bin/php
<?php

function ft_strlen($str)
{
	$i = 0;
	while ($str[$i] != "")
		$i++;
	return ($i);
}

function	char_cmp($a, $b)
{
	if (ctype_alpha($a))
	{
		if (ctype_alpha($b))
			return (strcasecmp($a, $b));
		else
			return (-1);
	}
	if (ctype_alpha($b))
	{
		if (ctype_alpha($a))
			return (strcasecmp($a, $b));
		else
			return (1);
	}
	if (is_numeric($a))
	{
		if (is_numeric($b))
			return ($a - $b);
		else
			return (-1);
	}
	if (is_numeric($b))
	{
		if (is_numeric($a))
			return ($a - $b);
		else
			return (1);
	}
	return (ord($a) - ord($b));
}

function	ft_compare($stra, $strb)
{
	$minlen = ft_strlen($stra);
	if (ft_strlen($strb) < $minlen)
		$minlen = ft_strlen($strb);
	
	$i = 0;
	while ($i < $minlen)
	{
		if (($ret = char_cmp($stra[$i], $strb[$i])) != 0)
			return ($ret);
		$i++;
	}
	return (ft_strlen($stra) - ft_strlen($strb));
}

if ($argc > 1)
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
	usort($tab, "ft_compare");

	foreach ($tab as $elem)
		echo $elem . PHP_EOL;
}

?>
