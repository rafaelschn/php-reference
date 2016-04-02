<?php

$host = 'localhost';
$path = "/reference/php-interfaces/http/request/reader.php";

if(0):

	$fp = fsockopen($host, 80, $errno, $errstr);
	
	if ( !$fp )
		die( "\nNo response from {$host}:80\n{$errno}: {$errstr}");
	
	$vars = array(
	    'hello' => 'world',
		'fname'=> 'John'
	);
	$content = http_build_query($vars);
	
	fwrite($fp, "POST {$path} HTTP/1.1\r\n");
	fwrite($fp, "Host: {$host}\r\n");
	fwrite($fp, "Content-Type: application/x-www-form-urlencoded\r\n");
	fwrite($fp, "Content-Length: ".strlen($content)."\r\n");
	fwrite($fp, "Connection: close\r\n");
	fwrite($fp, "\r\n");
	
	fwrite($fp, $content);
	
	header('Content-type: text/plain');
	
	while ( !feof($fp) ) {
	    echo fgets($fp, 1024);
	}

else:
	
	header('Content-type: text/plain');

	$post_vars = [
		'label' => 'description of the upload',
		'firstName'=> 'John'
	];

	$files = [
	  'upload_file_1.txt',
	  'upload_file_2.txt'
	];
	
	$images = array(
	  'image.jpg'
	);

	try {
		$boundary = sha1(1);
		$crlf = "\r\n";
		$body = '';
	
		foreach($post_vars as $key => $value):
			$body .= '--' . $boundary . $crlf
			. 'Content-Disposition: form-data; name="' . $key . '"' . $crlf
			. 'Content-Length: ' . strlen($value) . $crlf . $crlf
			. $value . $crlf;
		endforeach;
	
		$finfo = new \finfo(FILEINFO_MIME);
		
		foreach($files as $file):
			$mimetype = $finfo->file($file);
	
			$file_contents = quoted_printable_encode(file_get_contents($file));
	
			$body .= '--' . $boundary . $crlf
			. 'Content-Disposition: form-data; name="files[]"; filename="' . basename($file) .'"' . $crlf
			. 'Content-Type: ' . $mimetype . $crlf
			. 'Content-Length: ' . strlen($file_contents) . $crlf
			. 'Content-Type: application/octet-stream' . $crlf . $crlf
			. $file_contents . $crlf;
		endforeach;
		
		foreach($images as $key => $image):
			$mimetype = $finfo->file($image);
			
			$file_contents = quoted_printable_encode(file_get_contents($image));
			
			$body .= '--' . $boundary . $crlf
			. 'Content-Disposition: form-data; name="image' . $key . '"; filename="' . basename($image) .'"' . $crlf
			. 'Content-Type: ' . $mimetype . $crlf
			. 'Content-Length: ' . strlen($file_contents) . $crlf
			. 'Content-Type: application/octet-stream' . $crlf . $crlf
			. $file_contents . $crlf;
		endforeach;
	
		$body .= '--' . $boundary . '--';
	
		$fp = fsockopen($host, 80, $errno, $errstr);
		
		if ( !$fp ) throw new Exception("$errstr ($errno)");
			
		$write  = "POST {$path} HTTP/1.1\r\n";
		$write .= "Host: {$host}\r\n";
		$write .= "Content-type: multipart/form-data; boundary=".$boundary."\r\n";
		$write .= "Content-Length: " . strlen($body) . "\r\n";
		$write .= "Connection: Close\r\n\r\n";
		$write .= $body;
			
		fwrite($fp, $write);
			
		$response = '';
		while($line = fgets($fp, 1024)){
			$response .= $line;
		}
	
		fclose($fp);
		
		exit($response);
		
	} catch(Exception $e) {
		echo 'Error: '.$e->getMessage();
	}

endif;
