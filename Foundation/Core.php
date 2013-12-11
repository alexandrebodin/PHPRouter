<?php

namespace PHPRouter\Foundation;

Class Core {

	function __construct()
	{

	}

	function start()
	{
		$req = Request::parse_URL();
		if ($controller = $this->createController($req['controller']))
		{
			$action = $req['action'].'Action';
			call_user_func_array( array( $controller , $action ),$req['params']);
		}	
	}

	function createController($ctrl)
	{
		$name = $ctrl.'Controller';
		$file = __DIR__.'/../controller/'.$name.'.php';
		
		if(file_exists($file))
		{
			require $file;
			return new $name();
		}
		else return false;
		
	}


	function end()
	{

	}

}