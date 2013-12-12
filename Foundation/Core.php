<?php

namespace PHPRouter\Foundation;
use PHPRouter\Controllers;


Class Core {

	function start()
	{
			
		$req = new Request();
		$req->parse_URL_fromGlobal();

		if ($controller = $this->createController($req->controller)){		
			$action = $req->action.'Action';
			if ( method_exists($controller, $action)){
				call_user_func_array( array( $controller , $action ), array($req->params) );
			}
			else{
				echo 'no action';
			}
		}
		else
		{
			echo 'no page found';
		}
	}

	function createController($ctrl)
	{
		$name =  'PHPRouter\\Controllers\\'.$ctrl.'Controller';
		return class_exists($name) ? new $name() : false;		
		
	}
	
}