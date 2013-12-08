<?php

class MelodyApiTest extends TestCase {

	/**
	 * Test that Melody API endpoints are returning expected values
	 */

	public function testMelodyReturnsLineByDefault()
	{
    	$this->call('GET', 'melody');
    	$this->assertResponseOk();
	}

	public function testMelodyReturnsLineWithParameters()
	{
    	$this->call('GET', 'melody/1');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testMelodyReturnsLine404WithInvalidParameters()
	{
    	$this->call('GET', 'melody/0');
    	$this->assertResponseStatus(404);
	}

}