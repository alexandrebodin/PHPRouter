<?php

namespace PHPRouter\Foundation;

Class Request{

	public $controller, $action, $params;

	public function parse_URL_fromGlobal(){
		
		$url = $_SERVER['REQUEST_URI'];
		$script = $_SERVER['SCRIPT_NAME'];
		$r = ltrim($url,'/');
				
		$common = Request::getCommonPath( array($script,$url));		
		$common = trim($common,'/');
	
		$r = trim(substr($r,strlen($common)),'/');
		$r = explode('/', $r);

		$this->controller = (isset($r[0]) && $r[0] != '') ? $r[0] : 'Default' ;
		$this->action = (isset($r[1]) && $r[1]) ? $r[1] : 'Default';
		$this->params = array_slice($r, 2) ;
		
	}

	static function getCommonPath($paths) {

		$lastOffset = 1;
		$common = '/';
		while (($index = strpos($paths[0], '/', $lastOffset)) !== FALSE) {
			$dirLen = $index - $lastOffset + 1;	// include /
			$dir = substr($paths[0], $lastOffset, $dirLen);
			foreach ($paths as $path) {
				if (substr($path, $lastOffset, $dirLen) != $dir)
					return $common;
			}
			$common .= $dir;
			$lastOffset = $index + 1;
		}
		return $common;
	}
}