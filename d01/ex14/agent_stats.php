#!/usr/bin/php
<?php

if ($argc == 2)
{
	if ($argv[1] == "moyenne" 
		|| $argv[1] == "moyenne_user" 
		|| $argv[1] == "ecart_moulinette")
	{
		$line = trim(fgets(STDIN), "\n");
		$tab = explode(";", $line);
		if ($tab[0] == "User" 
			&& $tab[1] == "Note" 
			&& $tab[2] == "Noteur" 
			&& $tab[3] == "Feedback")
		{
			if ($argv[1] == "moyenne")
			{
				$sum = 0;
				$count = 0;
				while ($line = trim(fgets(STDIN), "\n"))
				{
					$tab_line = explode(";", $line);
					if (is_numeric($tab_line[1]) && $tab_line[2] != "moulinette")
					{
						$sum += $tab_line[1];
						$count += 1;
						$res = $sum / $count;
					}
				}
				echo $res . PHP_EOL;
			}
			else if ($argv[1] == "moyenne_user")
			{
				$users = [];

				while ($line = trim(fgets(STDIN), "\n"))
				{
					$tab_line = explode(";", $line);
					if (is_numeric($tab_line[1]) && $tab_line[2] != "moulinette")
					{
						if (!isset($users[$tab_line[0]]))
							$users[$tab_line[0]] = [0, 0];
						$users[$tab_line[0]][0] += 1;
						$users[$tab_line[0]][1] += $tab_line[1];
					}
				}
				ksort($users, SORT_STRING);
				foreach ($users as $user => $val)
				{
					$res = $val[1] / $val[0];
					echo $user . ":" . $res . PHP_EOL;
				}
			}
			else if ($argv[1] == "ecart_moulinette")
			{
				$users = [];
				$moulinette = [];

				while ($line = trim(fgets(STDIN), "\n"))
				{
					$tab_line = explode(";", $line);
					if (is_numeric($tab_line[1]) && $tab_line[2] != "moulinette")
					{
						if (!isset($users[$tab_line[0]]))
							$users[$tab_line[0]] = [0, 0];
						$users[$tab_line[0]][0] += 1;
						$users[$tab_line[0]][1] += $tab_line[1];
					}
					else if ($tab_line[2] == "moulinette")
					{
						if (!isset($moulinette[$tab_line[0]]))
							$moulinette[$tab_line[0]] = [0, 0];
						$moulinette[$tab_line[0]][0] += 1;
						$moulinette[$tab_line[0]][1] += $tab_line[1];
					}
				}
				ksort($users, SORT_STRING);
				foreach ($users as $user => $val) {
					if (isset($moulinette[$user]))
					{
						$res = ($val[1] / $val[0]);
						$res -= ($moulinette[$user][1] / $moulinette[$user][0]);
						echo $user . ":" . $res . PHP_EOL;
					}
					else
					{
						$res = $val[1] / $val[0];
						echo $user . ":" . $res . PHP_EOL;
					}
				}
			}
		}
	}
}

?>
