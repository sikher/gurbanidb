<?php

class MainApiTest extends TestCase {

	/**
	 * Test the Main API endpoints are returning expected values
	 */

	public function testAllReturnsLineByDefault()
	{
    	$this->call('GET', '/');
    	$this->assertResponseOk();
	}

	public function testAllReturnsLineWithLineParameters()
	{
    	$this->call('GET', '1');
    	$this->assertResponseOk();
	}

	public function testAllReturnsLineWithLineAndTranslationParameters()
	{
    	$this->call('GET', '1/1');
    	$this->assertResponseOk();
	}

	public function testAllReturnsLineWithLineTranslationAndTransliterationParameters()
	{
    	$this->call('GET', '1/1/55');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testAllReturnsLine404WithInvalidLineParameters()
	{
    	$this->call('GET', '0');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testAllReturnsLine404WithInvalidTranslationParameters()
	{
    	$this->call('GET', '1/0');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testAllReturnsLine404WithInvalidTransliterationParameters()
	{
    	$this->call('GET', '1/1/54');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testAllReturnsLine404WithAllInvalidParameters()
	{
    	$this->call('GET', '0/0/0');
    	$this->assertResponseStatus(404);
	}

	public function testAllReturnsPageByDefault()
	{
    	$this->call('GET', 'page');
    	$this->assertResponseOk();
	}

	public function testAllReturnsPageWithPageParameters()
	{
    	$this->call('GET', 'page/1');
    	$this->assertResponseOk();
	}

	public function testAllReturnsPageWithPageAndTranslationParameters()
	{
    	$this->call('GET', 'page/1/1');
    	$this->assertResponseOk();
	}

	public function testAllReturnsPageWithPageTranslationAndTransliterationParameters()
	{
    	$this->call('GET', 'page/1/1/55');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testAllReturnsPage404WithInvalidPageParameters()
	{
    	$this->call('GET', 'page/0');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testAllReturnsPage404WithInvalidTranslationParameters()
	{
    	$this->call('GET', 'page/1/0');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testAllReturnsPage404WithInvalidTransliterationParameters()
	{
    	$this->call('GET', 'page/1/1/54');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testAllReturnsPage404WithAllInvalidParameters()
	{
    	$this->call('GET', 'page/0/0/0');
    	$this->assertResponseStatus(404);
	}

	public function testAllReturnsHymnByDefault()
	{
    	$this->call('GET', 'hymn');
    	$this->assertResponseOk();
	}

	public function testAllReturnsHymnWithHymnParameters()
	{
    	$this->call('GET', 'hymn/1');
    	$this->assertResponseOk();
	}

	public function testAllReturnsHymnWithHymnAndTranslationParameters()
	{
    	$this->call('GET', 'hymn/1/1');
    	$this->assertResponseOk();
	}

	public function testAllReturnsHymnWithHymnTranslationAndTransliterationParameters()
	{
    	$this->call('GET', 'hymn/1/1/55');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testAllReturnsHymn404WithInvalidHymnParameters()
	{
    	$this->call('GET', 'hymn/0');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testAllReturnsHymn404WithInvalidTranslationParameters()
	{
    	$this->call('GET', 'hymn/1/0');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testAllReturnsHymn404WithInvalidTransliterationParameters()
	{
    	$this->call('GET', 'hymn/1/1/54');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testAllReturnsHymn404WithAllInvalidParameters()
	{
    	$this->call('GET', 'hymn/0/0/0');
    	$this->assertResponseStatus(404);
	}

}