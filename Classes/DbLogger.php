<?php

namespace Logger;
use PDO;

class DbLogger extends Logger
{
	private $connection;
	protected static $instance = null;
	//Объект создается в единственном экземпляре,
	//для создания объекта используется метод getInstance()
	static public function getInstance() 
	{
		if(is_null(self::$instance)){
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	private function __construct(){}
	
	private function __clone(){}
	
	private function __wakeup(){}

	public function setConnection($connection)
	{
		$this->connection = $connection;
	}
	
	public function unsetConnection(){
		unset($this->connection);
	}

	//Функция записи лога в БД
	public function log($level, $message, array $context = [])
	{
		if(empty($this->connection)){
			echo "Connection is not available\n";
			return;
		}
		$query = "INSERT INTO LoggerTable (Date, Level, Message, Context) VALUES (:logdate, :loglevel, :logmessage, :logcontext)";
		$sth = $this->connection->prepare($query);
		$message = is_Array($message)||is_Object($message)?json_encode($message):$message;  //если сообщение - массив или объект, вернуть в виде JSON-строки
		
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