<?php

namespace Logger;

class FileLogger extends Logger 
{
	private $path;
	protected static $instance;
	
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
	
	public function setPath($way = 'default.log')
	{
		$this->path = $way;
	}
	
	public function unsetPath()
	{
		unset($this->path);
	}

	public function log($level, $message, array $context = [])
	{
		$logmessage['date'] = $this->getDate();
		$logmessage['level'] = $level;
		$logmessage['message'] = $message;
		$logmessage['context'] = $this->contstr($context);
		file_put_contents($this->path, json_encode($logmessage).PHP_EOL, FILE_APPEND);
	}
}