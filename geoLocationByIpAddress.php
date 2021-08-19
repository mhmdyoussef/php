<?php
ini_set( 'display_errors', 1 );

$ip = $_SERVER['REMOTE_ADDR'];
$api_key = "";

$curl = curl_init();
curl_setopt_array( $curl, [
        CURLOPT_URL => "https://api.ipgeolocation.io/ipgeo?apiKey=$api_key&ip=$ip",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "content-type: application/json",
            ),
    ] );

$response = curl_exec($curl);
curl_close($curl);
$data = json_decode($response);

// print_r($data);

echo $data->country_name . "<br>" . $data->city . "<br>" . $data->district . "<br>";
