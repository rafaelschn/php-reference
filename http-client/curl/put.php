<?php

/**
 *  Example cURL
 *  PUT
 */

require_once realpath('./Response.php');
require_once realpath('./Request.php');

$url = "http://localhost/reference/php-interfaces/http/request/reader.php";

$fields = array(
	'lname' => 'First Name',
	'fname' => 'Last Name',
);

$postFields = http_build_query($fields);

$request = new Request($url);
$request
->option(CURLOPT_POSTFIELDS, $postFields)
->put();

header('Content-Type: text/plain');

echo "Request \n" . ($request->getHeaders()) . PHP_EOL;
echo "Response\n" . ($request->response()->headers()) . PHP_EOL;
echo "Content \n" . ($request->response()->content()) . PHP_EOL;
