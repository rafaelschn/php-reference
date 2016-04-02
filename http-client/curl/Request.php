<?php

class Request
{
	private $cUrl;
	
	private $url;
	private $method;
	private $saveRequestHeaders = true;
	private $saveResponseHeaders = true;
	private $returnTransfer = true;
	
	private $error;
	private $errno;
	private $response;
	
	private $methods = array(
		'OPTIONS',
		'GET',
		'HEAD',
		'POST',
		'PUT',
		'DELETE',
		'TRACE',
		'CONNECT'
	);
	
	public function __construct($url = '')
	{
		$this->url = $url;
		$this->method = 'GET';
		$this->cUrl = curl_init();
		$this->response = new Response();
	}
	
	public function __destruct()
	{
		curl_close($this->cUrl);
	}
	
	public function getCurl()
	{
		return $this->cUrl;
	}
	
	/*Option Methods*/
	
	public function saveRequestHeaders($save = true)
	{
		$this->saveRequestHeaders = $save;
	
		return $this;
	}
	
	public function option($option, $value)
	{
		curl_setopt($this->cUrl, $option, $value);
	
		return $this;
	}
	
	public function headers($headers)
	{
		curl_setopt($this->cUrl, CURLOPT_HTTPHEADER, $headers);
		
		return $this;
	}
	
	public function returnTransfer($return = true)
	{
		$this->returnTransfer = $return;
		
		return $this;
	}
	
	public function saveResponseHeaders($save = false)
	{
		$this->saveResponseHeaders = $save;
	
		return $this;
	}
	
	/*Execution Methods*/
	
	public function get($url = '')
	{
		$this->method = 'GET';
		$this->execute($url);
		
		return $this;
	}
	
	public function put($url = '')
	{
		$this->method = 'PUT';
		$this->execute($url);
	
		return $this;
	}
	
	public function delete($url = '')
	{
		$this->method = 'DELETE';
		$this->execute($url);
	
		return $this;
	}
	
	public function post($params = array(), $url = '')
	{
		$this->method = 'POST';
		
		curl_setopt($this->cUrl, CURLOPT_POST, true);
		curl_setopt($this->cUrl, CURLOPT_POSTFIELDS, $params);
		
		$this->execute($url);
	
		return $this;
	}
	
	protected function execute($url = '')
	{
		if($url)
			$this->url = $url;
		
		if(!$this->url)
			throw new Exception('No url provided.');
		
		curl_setopt($this->cUrl, CURLOPT_RETURNTRANSFER, $this->returnTransfer);
		curl_setopt($this->cUrl, CURLOPT_URL, $this->url);
		curl_setopt($this->cUrl, CURLOPT_CUSTOMREQUEST, $this->method);
		curl_setopt($this->cUrl, CURLINFO_HEADER_OUT, $this->saveRequestHeaders);
		curl_setopt($this->cUrl, CURLOPT_HEADER, $this->saveResponseHeaders);
		
		$response = curl_exec ( $this->cUrl );
		$this->errno = curl_errno ( $this->cUrl );
		$this->error = curl_error ( $this->cUrl );
		
		if($this->errno !== 0) throw new Exception($this->getErrors());
		
		$this->response->setContent($response);
		
		if($this->saveResponseHeaders):
			$headerSize = curl_getinfo($this->cUrl, CURLINFO_HEADER_SIZE);
			$this->response->setHeaders(substr($response, 0, $headerSize));
			$this->response->setContent(substr($response, $headerSize));
		endif;
		
		return $this;
	}
	
	/*Result Methods*/
	
	public function getErrors()
	{
		return "{$this->errno} - {$this->error}";
	}
	
	public function getInfo()
	{
		return curl_getinfo($this->cUrl);
	}
	
	public function getHeaders()
	{
		if($this->saveRequestHeaders):
			$info = $this->getInfo();
			return $info['request_header'];
		endif;
	
		return '';
	}
	
	public function response()
	{
		return $this->response;
	}
}
