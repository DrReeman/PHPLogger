<?php

	include './vendor/autoload.php';
	use Logger\Logger as Logger;
	
	$connection = new DBConnection('', ''); 	/*В качестве параметров конструктора
																необходимо указать логин и пароль пользователя БД*/
	$path = 'default.log';
	
	$justMessage = 'Test';
	//$messageArray = array('test1', 'test2', 'test3');
	//$messAssocArray = array('FirstElement'=>'test1', 'SecondElement'=>'test2', 'ThirdElement'=>'test3');
	
	$Obj1 = Logger::init('DbLogger');
	$Obj1->setConnection($connection);
	$Obj1->info($justMessage);
	
	$Obj2 = Logger::init('FileLogger');
	$Obj2->setPath($path);
	$Obj2->info($justMessage);
	
	$Obj3 = Logger::init('STDOutLogger');
	$Obj3->info($justMessage);
	//Помимо info() доступны другие методы протоколирования интерфейса Psr\Log\LoggerInterface