<?php

class GeneralRoutesTest extends TestCase {

	/**
	 * Test that page routes are returning expected values
	 */

	public function testHomepage()
	{
    	$this->call('GET', '/');
    	$this->assertResponseOk();
	}

	public function testAboutPage()
	{
    	$this->call('GET', 'about');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testNonExistentPageReturns404()
	{
    	$this->call('GET', '/non-existent');
    	$this->assertResponseStatus(404);
	}

}