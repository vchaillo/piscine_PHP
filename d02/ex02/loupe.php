#!/usr/bin/php
<?php

if ($argc > 1)
{
	$data = file_get_contents($argv[1]);
	echo $data;
}

?>
