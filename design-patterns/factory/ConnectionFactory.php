<?php

class ConnectionFactory
{
	public function getConnection()
	{
		$dbconfig = parse_ini_file('config.ini');
		$dbtype   = $dbconfig['dbtype'];
		$host     = $dbconfig['dbhost'];
		$user     = $dbconfig['dbuser'];
		$pwd      = $dbconfig['dbpwd'];
		$dbname   = $dbconfig['dbname'];
		
		$connection = new PDO("{$dbtype}:host={$host};dbname={$dbname}", $user, $pwd);
		return $connection;
	}
}
