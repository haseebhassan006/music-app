<?php

	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://api.lovo.ai/v1/conversion",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_BINARYTRANSFER => 1,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => 'text=hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage. hello world my name is Martha Sage.&speaker_id=Susan Cole&emphasis=[0,1]&pause=0&encoding=mp3',
	  CURLOPT_HTTPHEADER => array(
		"apikey: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjYwMjA5YzQzZTg1MGUxMDAxM2Y5NGIyNyIsImlhdCI6MTYzMzQyNTczNDEyNn0.ilSgA0GEiZT5sAiqoemOMDZZzCqU0c9JPTUzkjbTRq8",
		"Content-Type: application/x-www-form-urlencoded"
	  ),
	));
	
	$response = curl_exec($curl);
	curl_close($curl);
	//echo $response;
	
	$mp3Path = "../tts/lovoaudio8.mp3";
	chmod($mp3Path, 0777);
	$myfile = fopen($mp3Path, "w"); 
	fwrite($myfile, $response);
			
?>