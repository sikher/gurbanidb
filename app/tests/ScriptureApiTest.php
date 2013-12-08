<?php

class ScriptureApiTest extends TestCase {

	/**
	 * Test that Scripture API endpoints are returning expected values
	 */

	public function testScriptureReturnsLineByDefault()
	{
    	$this->call('GET', 'scripture');
    	$this->assertResponseOk();	
	}

	public function testScriptureReturnsLineWithParameters()
	{
    	$this->call('GET', 'scripture/1');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testScriptureReturnsLine404WithInvalidParameters()
	{
    	$this->call('GET', 'scripture/0');
    	$this->assertResponseStatus(404);
	}

	public function testScriptureReturnsPageByDefault()
	{
    	$this->call('GET', 'scripture/page');
    	$this->assertResponseOk();
	}

	public function testScriptureReturnsPageWithParameters()
	{
    	$this->call('GET', 'scripture/page/1');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testScriptureReturnsPage404WithInvalidParameters()
	{
    	$this->call('GET', 'scripture/page/0');
    	$this->assertResponseStatus(404);
	}

	public function testScriptureReturnsHymnByDefault()
	{
    	$this->call('GET', 'scripture/hymn');
    	$this->assertResponseOk();
	}

	public function testScriptureReturnsHymnWithParameters()
	{
    	$this->call('GET', 'scripture/hymn/1');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testScriptureReturnsHymn404WithInvalidParameters()
	{
    	$this->call('GET', 'scripture/hymn/0');
    	$this->assertResponseStatus(404);
	}


}