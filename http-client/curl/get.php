<?php
/**
 *  Example cURL
 *  GET
 */

require_once realpath('./Response.php');
require_once realpath('./Request.php');

$token = uniqid(null, true);
$headers = array(
  "OAuth-Token: $token"
);
$url = "http://localhost/reference/php-interfaces/http/request/reader.php";

$use = 0;

if($use):

	$request = new Request($url);
	$request
	->saveRequestHeaders(true)
	->saveResponseHeaders(true)
	->headers($headers)
	->returnTransfer(true)
	->get()
	;
	
	header('Content-Type: text/plain');
	
	echo "Request \n" . ($request->getHeaders()) . PHP_EOL;
	echo "Response\n" . ($request->response()->headers()) . PHP_EOL;
	echo "Content \n" . ($request->response()->content()) . PHP_EOL;

else:

	$returnHeader = true;

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_HEADER, $returnHeader);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLINFO_HEADER_OUT, true);
	
	$responseContent = curl_exec($ch);
	$info = curl_getinfo($ch);
	$requestHeaders = $info['request_header'];
	
	$errno = curl_errno ( $ch );
	$error = curl_error ( $ch );
	
	if($returnHeader):
		$headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
		$responseHeaders = substr($responseContent, 0, $headerSize);
		$responseContent = substr($responseContent, $headerSize);
	endif;
	
	curl_close($ch);
	
	header('Content-Type: text/plain');
	
	echo "Request \n" . ($requestHeaders) . PHP_EOL;
	echo "Response\n" . ($responseHeaders) . PHP_EOL;
	echo "Content \n" . ($responseContent) . PHP_EOL;
	
endif;
