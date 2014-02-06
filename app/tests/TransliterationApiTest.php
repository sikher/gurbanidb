<?php

class TransliterationApiTest extends TestCase {

	/**
	 * Test that Transliteration API endpoints are returning expected values
	 */

	public function testTransliterationReturnsLineByDefault()
	{
    	$this->call('GET', 'transliteration');
    	$this->assertResponseOk();
	}

	public function testTransliterationReturnsLineWithLineParameters()
	{
    	$this->call('GET', 'transliteration/1');
    	$this->assertResponseOk();
	}

	public function testTransliterationReturnsLineWithLineAndLanguageParameters()
	{
    	$this->call('GET', 'transliteration/1/55');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTransliterationReturnsLine404WithInvalidLineParameters()
	{
    	$this->call('GET', 'transliteration/0');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTransliterationReturnsLine404WithInvalidLanguageParameters()
	{
    	$this->call('GET', 'transliteration/1/54');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTransliterationReturnsLine404WithInvalidLineAndLanguageParameters()
	{
    	$this->call('GET', 'transliteration/0/54');
    	$this->assertResponseStatus(404);
	}

	public function testTransliterationReturnsPageByDefault()
	{
    	$this->call('GET', 'transliteration/page');
    	$this->assertResponseOk();
	}

	public function testTransliterationReturnsPageWithPageParameters()
	{
    	$this->call('GET', 'transliteration/page/1');
    	$this->assertResponseOk();
	}

	public function testTransliterationReturnsPageWithPageAndLanguageParameters()
	{
    	$this->call('GET', 'transliteration/page/1/55');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTransliterationReturnsPage404WithInvalidPageParameters()
	{
    	$this->call('GET', 'transliteration/page/0');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTransliterationReturnsPage404WithInvalidLanguageParameters()
	{
    	$this->call('GET', 'transliteration/page/1/54');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTransliterationReturnsPage404WithInvalidPageAndLanguageParameters()
	{
    	$this->call('GET', 'transliteration/page/0/0');
    	$this->assertResponseStatus(404);
	}

	public function testTransliterationReturnsHymnByDefault()
	{
    	$this->call('GET', 'transliteration/hymn');
    	$this->assertResponseOk();
	}

	public function testTransliterationReturnsHymnWithHymnParameters()
	{
    	$this->call('GET', 'transliteration/hymn/1');
    	$this->assertResponseOk();
	}

	public function testTransliterationReturnsHymnWithHymnAndLanguageParameters()
	{
    	$this->call('GET', 'transliteration/hymn/1/55');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTransliterationReturnsHymn404WithInvalidHymnParameters()
	{
    	$this->call('GET', 'transliteration/hymn/0');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTransliterationReturnsHymn404WithInvalidLanguageParameters()
	{
    	$this->call('GET', 'transliteration/hymn/1/54');
    	$this->assertResponseStatus(404);
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTransliterationReturnsHymn404WithInvalidHymnAndLanguageParameters()
	{
    	$this->call('GET', 'transliteration/hymn/0/54');
    	$this->assertResponseStatus(404);
	}

}