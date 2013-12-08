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

	public function testTransliterationReturnsLineWithParameters()
	{
    	$this->call('GET', 'transliteration/1');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTransliterationReturnsLine404WithInvalidParameters()
	{
    	$this->call('GET', 'transliteration/0');
    	$this->assertResponseStatus(404);
	}

	public function testTransliterationReturnsPageByDefault()
	{
    	$this->call('GET', 'transliteration/page');
    	$this->assertResponseOk();
	}

	public function testTransliterationReturnsPageWithParameters()
	{
    	$this->call('GET', 'transliteration/page/1');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTransliterationReturnsPage404WithInvalidParameters()
	{
    	$this->call('GET', 'transliteration/page/0');
    	$this->assertResponseStatus(404);
	}

	public function testTransliterationReturnsHymnByDefault()
	{
    	$this->call('GET', 'transliteration/hymn');
    	$this->assertResponseOk();
	}

	public function testTransliterationReturnsHymnWithParameters()
	{
    	$this->call('GET', 'transliteration/hymn/1');
    	$this->assertResponseOk();
	}

	/**
	* @expectedException Illuminate\Database\Eloquent\ModelNotFoundException
	*/
	public function testTransliterationReturnsHymn404WithInvalidParameters()
	{
    	$this->call('GET', 'transliteration/hymn/0');
    	$this->assertResponseStatus(404);
	}


}