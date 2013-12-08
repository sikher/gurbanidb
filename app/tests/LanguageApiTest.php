<?php

class LanguageApiTest extends TestCase {

	/**
	 * Test that Language API endpoints are returning expected values
	 */

	public function testLanguageReturnsLineByDefault()
	{
    	$this->call('GET', 'language');
    	$this->assertResponseOk();
	}

	public function testLanguageReturnsLineWithParameters()
	{
    	$this->call('GET', 'language/1');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testLanguageReturnsLine404WithInvalidParameters()
	{
    	$this->call('GET', 'language/0');
    	$this->assertResponseStatus(404);
	}

}