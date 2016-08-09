<?php

namespace Logger;
use PDO;

class DbLogger extends Logger
{
	private $connection;
	
	public function __construct($connection)
	{
		$this->connection = $connection;
	}
	
	public function __destruct()
	{
		$this->connection = NULL;
	}

	public function log($level, $message, array $context = [])
	{
		$query = "INSERT INTO LoggerTable (Date, Level, Message, Context) VALUES (:logdate, :loglevel, :logmessage, :logcontext)";
		$sth = $this->connection->prepare($query);
		$message = is_Array($message)||is_Object($message)?json_encode($message):$message;
		try {
			$this->connection->beginTransaction();
			$sth->bindParam(':logdate', $this->getDate(),  PDO::PARAM_STR);
			$sth->bindParam(':loglevel', $level, PDO::PARAM_STR);
			$sth->bindParam(':logmessage', $message, PDO::PARAM_STR, 255);
			$sth->bindParam(':logcontext', $this->contstr($context), PDO::PARAM_STR);
			$result = $sth->execute();
			$this->connection->commit();
		} catch (\PDOException $e) {
			$this->connection->rollback();
			echo "Database error: " . $e->getMessage();
			die();
		}
	}
	
}