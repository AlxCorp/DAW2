<?php

if (function_exists('curl_init')) {
    echo 'cURL está instalado en tu servidor.';
} else {
    echo 'cURL no está instalado en tu servidor.';
}

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => "http://192.168.1.14:8000/lines",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => array(
	),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$objeto = json_decode($response);

	echo $objeto:
	
}

?>