<?php
	
	define("LOCALHOST", "http://localhost/");	
	
	// Funzione che tramite cURL, prende parametro URL, restituisce json
	function callAPI($url){

		$cURLConnection = curl_init();

		curl_setopt($cURLConnection, CURLOPT_URL, $url);
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
		
		$newsList = curl_exec($cURLConnection);
		curl_close($cURLConnection);

		return $newsList;
	}