<?php

namespace Logger;
use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;
use DateTime;

abstract class Logger extends AbstractLogger implements LoggerInterface{
	
	abstract function log($level, $message, array $context = []);
	
	public function getDate()
	{
		$date = new DateTime();
		return $date->format('Y-m-d H:i:s');
	}
	
	public function contstr(array $context = [])
	{
		if(!empty($context)){
			return json_encode($context);
		}else{
			return "NULL";
		}
	}
}