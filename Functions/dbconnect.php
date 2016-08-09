<?php
		function connect(){
			
			$dbHost = 'localhost';
			$dbName = 'LoggerDB';
			$dbUser = 'root';
			$dbPass = 'reeman19940709=333';
			
			try {
				$dbh = new \pdo("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
				
			} catch (\pdoexception $e) {
				echo "database error: " . $e->getmessage();
				die();
			}
			return $dbh;
		}
?>
