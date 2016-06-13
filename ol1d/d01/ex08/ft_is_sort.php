<?php

function ft_is_sort($tab)
{
	$str = implode($tab);
	$str2 = implode($tab);
	if (strcmp($str, $str2) == 0)
		return (true);
	else
		return (false);
}

?>
