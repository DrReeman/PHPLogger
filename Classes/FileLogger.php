<?php

namespace Logger;

class FileLogger extends Logger 
{
	private $path;
	
	public function __construct($way)
	{
		$this->path = $way;
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