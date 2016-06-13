#!/usr/bin/php
<?PHP

if ($argc > 1)
{
	if ((preg_match("/[Ll]undi|[Mm]ardi|[mM]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche [12][0-9]|3[01] [Jj]anvier|[Ff]evrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]ecembre [0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{4}/", $argv[1])))
	{
		$date = explode(" ", $argv[1]);
		$hour = explode(":", $date[4]);
		$rep = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12");
		$pat = array("/[Jj]anvier/", "/[Ff]evrier/", "/[Mm]ars/", "/[Aa]vril/", "/[Mm]ai/", "/[Jj]uin/", "/[Jj]uillet/", "/[Aa]out/", "/[Ss]eptembre/", "/[Oo]ctobre/", "/[Nn]ovembre/", "/[Dd]ecembre/");
		$date = preg_replace ($pat, $rep, $date);
		date_default_timezone_set("CET");
		$n = mktime($hour[0], $hour[1], $hour[2], (int)$date[2], (int)$date[1], (int)$date[3]);
		echo $n . "\n";
	}
	else
		echo "Wrong Format\n";
}

?>
