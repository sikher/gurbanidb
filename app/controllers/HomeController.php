<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public $about = Array('name'=>'GurbaniDB','version'=>'2.0');

	public function showHome()
	{
		return View::make('index');
	}

	public function showAbout()
	{
		return Response::json($this->about);
	}

	public function showScripturePage($page_id = 1)
	{
		$data = Scripture::page($page_id)->get();

		$this->throwError($data);

		return Response::json($data);
	}

	public function showScriptureHymn($hymn_id = 1)
	{
		$data = Scripture::hymn($hymn_id)->get();

		$this->throwError($data);
		
		return Response::json($data);
	}

	public function showScriptureLine($id = 1)
	{
		$data = Scripture::line($id)->firstOrFail();

		return Response::json($data);
	}

	public function showTranslationPage($page_id = 1, $language_id = 1)
	{
		$data = Scripture::page($page_id)->get();

		$this->throwError($data);

		foreach($data as $line) {
			$line['translation'] = json_decode((String)Translation::whereRaw("scripture_id = {$line->id} and language_id = {$language_id}")->firstOrFail());
		}
		
		return Response::json($data);
	}

	public function showTranslationHymn($hymn_id = 1, $language_id = 1)
	{
		$data = Scripture::hymn($hymn_id)->get();

		$this->throwError($data);

		foreach($data as $line) {
			$line['translation'] = json_decode((String)Translation::whereRaw("scripture_id = {$line->id} and language_id = {$language_id}")->firstOrFail());
		}
		
		return Response::json($data);
	}

	public function showTranslationLine($scripture_id = 1, $language_id = 1)
	{
		$data = Translation::line($scripture_id,$language_id)->get();
		
		return Response::json($data);
	}

	public function showTransliterationPage($page_id = 1, $language_id = 55)
	{
		$data = Scripture::page($page_id)->get();

		$this->throwError($data);

		foreach($data as $line) {
			$line['transliteration'] = json_decode((String)Transliteration::whereRaw("scripture_id = {$line->id} and language_id = {$language_id}")->firstOrFail());
		}
		
		return Response::json($data);
	}

	public function showTransliterationHymn($hymn_id = 1, $language_id = 55)
	{
		$data = Scripture::hymn($hymn_id)->get();

		$this->throwError($data);

		foreach($data as $line) {
			$line['transliteration'] = json_decode((String)Transliteration::whereRaw("scripture_id = {$line->id} and language_id = {$language_id}")->firstOrFail());
		}
		
		return Response::json($data);
	}

	public function showTransliterationLine($scripture_id = 1, $language_id = 55)
	{
		$data = Transliteration::line($scripture_id,$language_id)->get();
		
		return Response::json($data);
	}

	public function showMelodies()
	{
		$data = Melody::all();

		$this->throwError($data);

		return Response::json($data);
	}

	public function showMelody($id = 1)
	{
		$data = Melody::line($id)->firstOrFail();

		return Response::json($data);
	}

	public function showAuthors()
	{
		$data = Author::all();

		$this->throwError($data);

		return Response::json($data);
	}

	public function showAuthor($id = 1)
	{
		$data = Author::line($id)->firstOrFail();

		return Response::json($data);
	}

	public function showLanguages()
	{
		$data = Language::all();

		$this->throwError($data);

		return Response::json($data);
	}

	public function showLanguage($id = 1)
	{
		$data = Language::line($id)->firstOrFail();

		return Response::json($data);
	}

	private function throwError($data)
	{
		if(count($data) === 0) {
			throw new Illuminate\Database\Eloquent\ModelNotFoundException;
		}
	}

}