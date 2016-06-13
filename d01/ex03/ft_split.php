#!/usr/bin/php
<?PHP

function ft_split($string)
{
	$tab = explode(" ", $string);
	foreach($tab as $a => $b)
	{
		if (trim($b))
			$tab2[] = trim($b);
		array_multisort($tab2, SORT_STRING);
	}
	return ($tab2);
}

?>
