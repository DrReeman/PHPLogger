<?php
class DBConnection extends PDO{
	
	private $DB_HOST = 'localhost';
	private $DB_NAME = 'LoggerDB';
	private $DB_USER;
	private $DB_PASS;
	
	function __construct($dbUser, $dbPass)
	{
		$this->DB_USER = $dbUser;
		$this->DB_PASS = $dbPass;
			
		try {
			parent::__construct("mysql:host=$this->DB_HOST;dbname=$this->DB_NAME", $this->DB_USER, $this->DB_PASS);
			
		} catch (\pdoexception $e) {
			echo "database error: " . $e->getmessage();
			die();
		}
	}
}
