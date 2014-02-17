<?php

class SearchApiTest extends TestCase {

	/**
	 * Test that Search API endpoints are returning expected values
	 */

	public function testSearchScriptureFirstLettersStartByDefault()
	{
    	$this->call('GET', '/search');
    	$this->assertResponseOk();
	}

	public function testSearchScriptureFirstLettersStartWithParameters()
	{
    	$this->call('GET', '/search/ੴ');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testSearchScriptureFirstLettersStartWithIncorrectParameters()
	{
    	$this->call('GET', '/search/0');
    	$this->assertResponseStatus(404);
	}

	public function testSearchScriptureFirstLettersAnywhereByDefault()
	{
    	$this->call('GET', '/search/1');
    	$this->assertResponseOk();
	}

	public function testSearchScriptureFirstLettersAnywhereWithParameters()
	{
    	$this->call('GET', '/search/1/ੴ/10');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testSearchScriptureFirstLettersAnywhereWithIncorrectParameters()
	{
    	$this->call('GET', '/search/1/0');
    	$this->assertResponseStatus(404);
	}

	public function testSearchScriptureWordsByDefault()
	{
    	$this->call('GET', '/search/2');
    	$this->assertResponseOk();
	}

	public function testSearchScriptureWordsWithParameters()
	{
    	$this->call('GET', '/search/2/ੴ/10');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testSearchScriptureWordsWithIncorrectParameters()
	{
    	$this->call('GET', '/search/2/0');
    	$this->assertResponseStatus(404);
	}

	public function testSearchTranslationWordsByDefault()
	{
    	$this->call('GET', '/search/3');
    	$this->assertResponseOk();
	}

	public function testSearchTranslationWordsWithParameters()
	{
    	$this->call('GET', '/search/3/God/13/69/10');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testSearchTranslationWordsWithIncorrectParameters()
	{
    	$this->call('GET', '/search/3/ੴ');
    	$this->assertResponseStatus(404);
	}

	public function testSearchTransliterationWordsByDefault()
	{
    	$this->call('GET', '/search/4');
    	$this->assertResponseOk();
	}

	public function testSearchTransliterationWordsWithParameters()
	{
    	$this->call('GET', '/search/4/nanak/13/69/10');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testSearchTransliterationWordsWithIncorrectParameters()
	{
    	$this->call('GET', '/search/4/ੴ');
    	$this->assertResponseStatus(404);
	}

}