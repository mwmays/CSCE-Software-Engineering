<?php
	$query = $_GET["name"];
	$Amazon = "http://www.amazon.com/dp/".$query;
	$url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=amazon%20".$query."%20buy%20new.%20price";

$body = file_get_contents($url);
$json = json_decode($body);


$myArray = str_split($json->responseData->results[0]->content);
$out = '$';

for ($i = 0; $i <= sizeof($myArray) - 1; $i++)
{
	if ($myArray[$i] == '$')
	{
		while($myArray[$i] != '.')
		{
			$out = $out.$myArray[$i+1];
			$i++;
		}
		$out = $out.$myArray[$i+1].$myArray[$i+2];
		break;
	}
}
if ($out == '$')
{
	$out = "Amazon does not sell this book";
	print_r($out);
	echo "<br>";
}
else
{ 

    print_r("Buy new from "."<a href=$Amazon>Amazon</a>"." for ".$out);
	echo "<br>";
	
}


$url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=barnes%20and%20noble%20".$query."%20list%20price";

$body = file_get_contents($url);
$json = json_decode($body);


$myArray = str_split($json->responseData->results[0]->content);
$Barnes = "http://www.barnesandnoble.com/s/test?keyword=".$query;
$out = '$';

for ($i = 0; $i <= sizeof($myArray) - 1; $i++)
{
	if ($myArray[$i] == '$')
	{
		while($myArray[$i] != '.')
		{
			$out = $out.$myArray[$i+1];
			$i++;
		}
		$out = $out.$myArray[$i+1].$myArray[$i+2];
		break;
	}
}
if ($out == '$')
{
	$out = "Barnes and Noble does not sell this book";
	print_r($out);
	echo "<br>";
}
else
{
    print_r("List Price on "."<a href=$Barnes>Barnes and Noble</a>"."  is ".$out);
	echo "<br>";
}


?>
<a href="index.php">Return Home</a>