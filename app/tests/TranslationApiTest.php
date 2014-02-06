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

	public function testTranslationReturnsLineWithLineParameters()
	{
    	$this->call('GET', 'translation/1');
    	$this->assertResponseOk();
	}

	public function testTranslationReturnsLineWithLineAndLanguageParameters()
	{
    	$this->call('GET', 'translation/1/1');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTranslationReturnsLine404WithInvalidLineParameters()
	{
    	$this->call('GET', 'translation/0');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTranslationReturnsLine404WithInvalidLanguageParameters()
	{
    	$this->call('GET', 'translation/1/0');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTranslationReturnsLine404WithInvalidLineAndLanguageParameters()
	{
    	$this->call('GET', 'translation/0/0');
    	$this->assertResponseStatus(404);
	}

	public function testTranslationReturnsPageByDefault()
	{
    	$this->call('GET', 'translation/page');
    	$this->assertResponseOk();
	}

	public function testTranslationReturnsPageWithPageParameters()
	{
    	$this->call('GET', 'translation/page/1');
    	$this->assertResponseOk();
	}

	public function testTranslationReturnsPageWithPageAndLanguageParameters()
	{
    	$this->call('GET', 'translation/page/1/1');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTranslationReturnsPage404WithInvalidPageParameters()
	{
    	$this->call('GET', 'translation/page/0');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTranslationReturnsPage404WithInvalidLanguageParameters()
	{
    	$this->call('GET', 'translation/page/1/0');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTranslationReturnsPage404WithInvalidPageAndLanguageParameters()
	{
    	$this->call('GET', 'translation/page/0/0');
    	$this->assertResponseStatus(404);
	}

	public function testTranslationReturnsHymnByDefault()
	{
    	$this->call('GET', 'translation/hymn');
    	$this->assertResponseOk();
	}

	public function testTranslationReturnsHymnWithHymnParameters()
	{
    	$this->call('GET', 'translation/hymn/1');
    	$this->assertResponseOk();
	}

	public function testTranslationReturnsHymnWithHymnAndLanguageParameters()
	{
    	$this->call('GET', 'translation/hymn/1/1');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTranslationReturnsHymn404WithInvalidHymnParameters()
	{
    	$this->call('GET', 'translation/hymn/0');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTranslationReturnsHymn404WithInvalidLanguageParameters()
	{
    	$this->call('GET', 'translation/hymn/1/0');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTranslationReturnsHymn404WithInvalidHymnAndLanguageParameters()
	{
    	$this->call('GET', 'translation/hymn/0/0');
    	$this->assertResponseStatus(404);
	}

}