<?php

require_once 'core/Core.php';

class LaunchTest extends PHPUnit_Framework_TestCase
{
	 function testSetUp()
	{
		$this->assertInstanceOf('Core', new Core());
	}

}