<?php

/**
 *  Example cURL
 *  POST
 */

require_once realpath('./Response.php');
require_once realpath('./Request.php');

$url = "http://localhost/reference/php-interfaces/http/request/reader.php";

$finfo = new \finfo(FILEINFO_MIME);
$file = realpath('./app.log');

$fields = array(
	'lname' => 'First Name',
	'fname' => 'Last Name',
	'file1'=> curl_file_create(realpath('./app.log'), 'text/plain')
	'file2'=> new \CurlFile($file, $finfo->file($file))
);

if(1):

	$request = new Request($url);
	$request->post($fields);
	
	header('Content-Type: text/plain');
	
	echo "Request \n" . ($request->getHeaders()) . PHP_EOL;
	echo "Response\n" . ($request->response()->headers()) . PHP_EOL;
	echo "Content \n" . ($request->response()->content()) . PHP_EOL;

else:

	$ch = curl_init();
	
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	
	$output = curl_exec($ch);
	
	$info = curl_getinfo($ch);
	
	$errno = curl_errno ( $ch );
	$error = curl_error ( $ch );
	
	header('Content-Type: text/plain');
	
	echo($output) . PHP_EOL;
	
	curl_close($ch);

endif;
