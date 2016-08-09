<?php

namespace Logger;

class STDOutLogger extends Logger 
{
	public function log($level, $message, array $context = [])
	{
		$logmessage['date'] = $this->getDate();
		$logmessage['level'] = $level;
		$logmessage['message'] = $message;
		$logmessage['context'] = $this->contstr($context);
		fwrite(STDOUT, json_encode($logmessage).PHP_EOL);
	}
}