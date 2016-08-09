<?php

	include './vendor/autoload.php';
	$connection = connect();
	
	$justMessage = 'Test';
	$messageArray = array('test1', 'test2', 'test3');
	$messAssocArray = array('FirstElement'=>'test1', 'SecondElement'=>'test2', 'ThirdElement'=>'test3');
	
	class Exemple {
		public $var1 = "12";
		public function __toString()
		{
			return $this->var1;
		}
	}
	
	$objEx = new Exemple();
	
	$Obj1 = new Logger\DbLogger($connection);
	$Obj1->info($justMessage);
	$Obj1->info($messageArray);
	$Obj1->info($messAssocArray);
	$Obj1->info($objEx);
	
	$way = 'testLog.txt';
	$Obj2 = new Logger\FileLogger($way);
	$Obj2->info($justMessage);
	$Obj2->info($messageArray);
	$Obj2->info($messAssocArray);
	$Obj2->info($objEx);
	
	$Obj3 = new Logger\STDOutLogger();
	$Obj3->info($justMessage);
	$Obj3->info($messageArray);
	$Obj3->info($messAssocArray);
	$Obj3->info($objEx);
	