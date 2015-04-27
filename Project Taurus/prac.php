<?php
$url = "https://www.googleapis.com/books/v1/volumes?q=Operating+System+Concepts";
$body = file_get_contents($url);
$array = str_split($body);
for($i = 0; $i < sizeof($array); $i++)
{
	if($array[$i] == 'l' && $array[$i+1] == 'i' && $array[$i+2] == 's' && $array[$i+3] == 't' && $array[$i+4] == 'P' && $array[$i+5] == 'r' && $array[$i+6] == 'i' && $array[$i+7] == 'c' && $array[$i+8] == 'e')
	{
		echo $array[$i+ 29];
		echo $array[$i+ 30];
		echo $array[$i+ 31];
		echo $array[$i+ 32];
		
		break;
	}
}

?>