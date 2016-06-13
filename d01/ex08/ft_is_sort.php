<?php

function ft_is_sort($tab)
{
	$tab1 = $tab;
	sort($tab);
	$str = implode($tab);
	$str2 = implode($tab1);
	if (strcmp($str, $str2) == 0)
		return (true);
	else
		return (false);
}

?>
