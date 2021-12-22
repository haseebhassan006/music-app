<?php

	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api.lovo.ai/v1/skins?language=spanish",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
		"apikey: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjYwMjA5YzQzZTg1MGUxMDAxM2Y5NGIyNyIsImlhdCI6MTYyOTk0MTM3MzYyMH0.VaaUXSRJbPqtCmkbUTYh2FgrXotEtq3fgFvbWkD2jfc",
		"Content-Type: application/json"
	  ),
	));
	
	$response = curl_exec($curl);
	curl_close($curl);
	
	//echo $response;
	
	$result = json_decode($response,true);
	echo "<pre>";
		//print_r($resultdata);
		foreach($result['data'] as $abc){
			echo "<br><br>".$abc['name']."==".$abc['links']['audio'];
		}
	
?>