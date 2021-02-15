<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$handle = fopen("news.txt", "r");
$arrayNews = array();

for ($i = 0; $row = fgetcsv($handle ); ++$i) {
    $news = (explode(";", $row[0]));
	$arrayNews[$i]["indice"] = $news[0];
    $arrayNews[$i]["titolo"] = $news[1];
    $arrayNews[$i]["autore"] = $news[2];
    $arrayNews[$i]["body"] 	 = $news[3];
}

// Con questo le randomizzo dopo averle lette tutte
shuffle($arrayNews);

// chiudo la lettura del file
fclose($handle);


// Da qui intercetto la chiamata cURL ed in base al parametro restituisco ALL, ONE o di default ONE.
if ($_REQUEST['type'] == 'all'){
	echo json_encode($arrayNews);
}
else if ($_REQUEST['type'] == 'one'){
	echo json_encode($arrayNews[0]);
}
else
	echo json_encode($arrayNews[0]);