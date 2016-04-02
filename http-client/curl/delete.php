<?php

/**
 *  Example cURL
 *  DELETE
 */

require_once realpath('./Response.php');
require_once realpath('./Request.php');

$url = "http://localhost/reference/php-interfaces/http/request/reader.php";

$fields = array(
	'lname' => 'First Name',
	'fname' => 'Last Name'
);

$request = new Request($url);
$request->delete();

header('Content-Type: text/plain');

echo "Request \n" . ($request->getHeaders()) . PHP_EOL;
echo "Response\n" . ($request->response()->headers()) . PHP_EOL;
echo "Content \n" . ($request->response()->content()) . PHP_EOL;
