<?php

$host = "localhost";
$path = "/reference/php-interfaces/http/request/reader.php";

$packet  = "GET {$path} HTTP/1.1\r\n";
$packet .= "Host: {$host}\r\n";
$packet .= "Accept: */*\r\n";
$packet .= "Connection: close\r\n\r\n";

$sock = fsockopen($host, 80, $errno, $errstr);

if ( !$sock )
	die( "\nNo response from {$host}:80\n{$errno}: {$errstr}");

fwrite($sock, $packet);
$response = stream_get_contents($sock);

header('Content-Type: text/plain');

echo $response;

fclose($sock);
