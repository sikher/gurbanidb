<?php

class AuthorApiTest extends TestCase {

	/**
	 * Test that Author API endpoints are returning expected values
	 */

	public function testAuthorReturnsLineByDefault()
	{
    	$this->call('GET', 'author');
    	$this->assertResponseOk();
	}

	public function testAuthorReturnsLineWithParameters()
	{
    	$this->call('GET', 'author/1');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testAuthorReturnsLine404WithInvalidParameters()
	{
    	$this->call('GET', 'author/0');
    	$this->assertResponseStatus(404);
	}

}