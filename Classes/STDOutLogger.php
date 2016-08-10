<?php

namespace Logger;

class STDOutLogger extends Logger 
{
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
	
	public function log($level, $message, array $context = [])
	{
		$logmessage['date'] = $this->getDate();
		$logmessage['level'] = $level;
		$logmessage['message'] = $message;
		$logmessage['context'] = $this->contstr($context);
		fwrite(STDOUT, json_encode($logmessage).PHP_EOL);
	}
}