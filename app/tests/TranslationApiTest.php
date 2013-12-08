<?php

class TranslationApiTest extends TestCase {

	/**
	 * Test that Translation API endpoints are returning expected values
	 */

	public function testTranslationReturnsLineByDefault()
	{
    	$this->call('GET', 'translation');
    	$this->assertResponseOk();
	}

	public function testTranslationReturnsLineWithParameters()
	{
    	$this->call('GET', 'translation/1');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTranslationReturnsLine404WithInvalidParameters()
	{
    	$this->call('GET', 'translation/0');
    	$this->assertResponseStatus(404);
	}

	public function testTranslationReturnsPageByDefault()
	{
    	$this->call('GET', 'translation/page');
    	$this->assertResponseOk();
	}

	public function testTranslationReturnsPageWithParameters()
	{
    	$this->call('GET', 'translation/page/1');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTranslationReturnsPage404WithInvalidParameters()
	{
    	$this->call('GET', 'translation/page/0');
    	$this->assertResponseStatus(404);
	}

	public function testTranslationReturnsHymnByDefault()
	{
    	$this->call('GET', 'translation/hymn');
    	$this->assertResponseOk();
	}

	public function testTranslationReturnsHymnWithParameters()
	{
    	$this->call('GET', 'translation/hymn/1');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTranslationReturnsHymn404WithInvalidParameters()
	{
    	$this->call('GET', 'translation/hymn/0');
    	$this->assertResponseStatus(404);
	}


}