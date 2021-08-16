<!DOCTYPE html>
<html>
<body>

<?php

// SMS1 API base URL
$api_base_url = 'https://IP:PORT/api/service/';

// The API name according to SMS1.ir
// $api_name = 'send';
$api_name = 'patternSend';

// Token is received from SMS1.ir
$token = "YOUR_TOKEN";

// Setting the HTTP request headers
$request_headers = array(
			// Setting the HTTP 'Authorization' header equal to the received Token from SMS1.ir
            'Authorization: Bearer ' . $token,
            "Content-Type: application/json",
			// Setting the HTTP 'Accept' header to JSON
			"Accept: application/json");

// Sample input model for API 'patternSend'
$pattern_send_data = array(
        "patternId" => 2,
        "recipient" => "09120000000",
		"pairs" => array("variable_1" => "value_1", "variable_2" => "value_2"));
		
// Sample input model for API 'send'
$send_data = array(
        "message" => "سلام",
        "recipient" => "09120000000");

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => $request_headers,
		// For API 'send', you should use the '$send_data' variable instead of '$pattern_send_data'
        'content' => json_encode($pattern_send_data)
    )
);

$context  = stream_context_create($opts);

// Sending the request
file_get_contents($api_base_url . $api_name, false, $context);

// Printing the response details such as HTTP status code, etc.
var_dump($http_response_header);

?>

</body>
</html>
