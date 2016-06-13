#!/usr/bin/php
<?PHP

while (42)
{

	echo "Entrez un nombre: ";
	
	if (($n = fgets (STDIN)) == FALSE)
	{
		echo "\n";
		break ;
	}
	$n = substr($n, 0, -1);

	if (is_numeric($n))
	{
		if ($n % 2)
			echo "Le chiffre " . $n . " est impair\n";
		else
			echo "Le chiffre " . $n . " est pair\n";
	}
	else
		echo "'" . $n . "'" . " n'est pas un chiffre\n";
}
?>
