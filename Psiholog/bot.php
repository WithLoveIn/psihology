<?php

file_put_contents('viber.json', file_get_contents('php://input'));
$viber = file_get_contents('viber.json');
$viber=JSON_decode($viber);

function send($message){
	$curl = curl_init();

	curl_setopt_array($curl,array(
	CURLOPT_URL =>"https://chatapi.viber.com/pa/set_webhook",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT =>30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
	CURLOPT_CUSTOMREQUEST =>"POST",
	CURLOPT_POSTFIELDS =>JSON_encode($message),
	CURLOPT_HTTPHEADER => array(
	"Cache-control: no-cache",
	"Content-Type: application/JSON",
	"X-Viber-Auth-Token:4e23f30f9067d448-f580559b45216111-61109c862d3403bf"),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	if ($err){
		echo "curl Error#:" . $err;
	} else{
		echo $response;
	}
}

if ($viber->event == "conversation_started"){
	$message['receiver']=$viber->user->id;
	$message['type']='text';
	$message['text'] = 'Hello world';

	send($message);
	exit;
}

?>