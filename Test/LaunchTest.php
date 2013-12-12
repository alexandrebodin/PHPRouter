<?php


require __DIR__.'/../vendor/autoload.php';

class LaunchTest extends PHPUnit_Framework_TestCase
{
	/*
	*@test
	 */
	 function testSetUp()
	{
		$this->assertInstanceOf('PHPRouter\Foundation\Core', new PHPRouter\Foundation\Core());
	}



}
