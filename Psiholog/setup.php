<?php

$curl = curl_init();

curl_setopt_array($curl,array(
CURLOPT_URL =>"https://chatapi.viber.com/pa/set_webhook",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT =>30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
CURLOPT_CUSTOMREQUEST =>"POST",
CURLOPT_POSTFIELDS =>"{\r\n \"url\": \"https://Psiholog/viber/bot.php\",\r\n \"event_types\":[\r\n \"conversation_started\"\r\n ]\r\n}",
CURLOPT_HTTPHEADER => array(
"Cache-control: no-cache",
"Content-Type: application/JSON",
"X-Viber-Auth-Token:4e23f30f9067d448-f580559b45216111-61109c862d3403bf"),
));

$response = curl_exec($curl);

if ($err){
	echo"Curl Error#: ".$err;
} else {
	echo $response;
}