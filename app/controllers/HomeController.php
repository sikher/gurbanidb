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

	// General Routes

	public $about = array('name'=>'GurbaniDB','version'=>'2.2');

	public function showHome()
	{
		return View::make('index');
	}

	public function showAbout()
	{
		return Response::json($this->about);
	}

	// Meta API Routes

	public function showMelodies()
	{
		$data = Melody::all();

		$this->throwError($data);

		return Response::json($data);
	}

	public function showMelody($melody_id = 1)
	{
		$data = Melody::line($melody_id)->firstOrFail();

		return Response::json($data);
	}

	public function showAuthors()
	{
		$data = Author::all();

		$this->throwError($data);

		return Response::json($data);
	}

	public function showAuthor($author_id = 1)
	{
		$data = Author::line($author_id)->firstOrFail();

		return Response::json($data);
	}

	public function showLanguages()
	{
		$data = Language::all();

		$this->throwError($data);

		return Response::json($data);
	}

	public function showLanguage($language_id = 1)
	{
		$data = Language::line($language_id)->firstOrFail();

		return Response::json($data);
	}

	// Search API Routes

	public function showSearchScriptureFirstLettersStart($search = '', $translation = 13, $transliteration = 69, $offset = 0)
	{
		$data = Scripture::searchfirstlettersstart($search, $offset)->get();

		foreach($data as $line) {
			$line['translation'] = Translation::only($line->id,$translation)->firstOrFail()->toArray();
			$line['transliteration'] = Transliteration::only($line->id,$transliteration)->firstOrFail()->toArray();
		}

		$this->throwError($data);

		return Response::json($data);
	}

	public function showSearchScriptureFirstLettersAnywhere($search = '', $translation = 13, $transliteration = 69, $offset = 0)
	{
		$data = Scripture::searchfirstlettersanywhere($search, $offset)->get();

		foreach($data as $line) {
			$line['translation'] = Translation::only($line->id,$translation)->firstOrFail()->toArray();
			$line['transliteration'] = Transliteration::only($line->id,$transliteration)->firstOrFail()->toArray();
		}

		$this->throwError($data);

		return Response::json($data);
	}

	public function showSearchScriptureWords($search = '', $translation = 13, $transliteration = 69, $offset = 0)
	{
		$data = Scripture::searchwords($search, $offset)->get();

		foreach($data as $line) {
			$line['translation'] = Translation::only($line->id,$translation)->firstOrFail()->toArray();
			$line['transliteration'] = Transliteration::only($line->id,$transliteration)->firstOrFail()->toArray();
		}

		$this->throwError($data);

		return Response::json($data);
	}

	public function showSearchTranslationWords($search = '', $translation = 13, $transliteration = 69, $offset = 0)
	{
		$data = Translation::searchwords($search, $translation, $offset)->get();

		foreach($data as $line) {
			$line['transliteration'] = Transliteration::only($line->scripture_id,$transliteration)->firstOrFail()->toArray();
		}

		$this->throwError($data);

		return Response::json($data);
	}

	public function showSearchTransliterationWords($search = '', $translation = 13, $transliteration = 69, $offset = 0)
	{
		$data = Transliteration::searchwords($search, $transliteration, $offset)->get();

		foreach($data as $line) {
			$line['translation'] = Translation::only($line->scripture_id,$translation)->firstOrFail()->toArray();
		}

		$this->throwError($data);

		return Response::json($data);
	}	

	// Main API Routes

	public function showAllPage($page = 1, $translation = 13, $transliteration = 69)
	{
		$data = Scripture::page($page)->get();

		foreach($data as $line) {
			$line['translation'] = Translation::only($line->id,$translation)->firstOrFail()->toArray();
			$line['transliteration'] = Transliteration::only($line->id,$transliteration)->firstOrFail()->toArray();
		}

		$this->throwError($data);

		return Response::json($data);
	}

	public function showAllHymn($hymn = 1, $translation = 13, $transliteration = 69)
	{
		$data = Scripture::hymn($hymn)->get();

		foreach($data as $line) {
			$line['translation'] = Translation::only($line->id,$translation)->firstOrFail()->toArray();
			$line['transliteration'] = Transliteration::only($line->id,$transliteration)->firstOrFail()->toArray();
		}

		$this->throwError($data);

		return Response::json($data);
	}

	public function showAllLine($scripture_id = 1, $translation = 13, $transliteration = 69)
	{
		$data = Scripture::line($scripture_id)->firstOrFail();

		$data['translation'] = Translation::only($data->id,$translation)->firstOrFail()->toArray();
		$data['transliteration'] = Transliteration::only($data->id,$transliteration)->firstOrFail()->toArray();

		$this->throwError($data);

		return Response::json($data);
	}

	public function showRandom($type = 1, $translation = 13, $transliteration = 69)
	{
		$random_page = rand(1,1430);
		$random_hymn = rand(1,3620);

		// Page
		if($type == 1)
		{
			return $this->showAllPage($random_page, $translation, $transliteration);
		}

		// Hymn
		if($type == 2)
		{
			return $this->showAllHymn($random_hymn, $translation, $transliteration);
		}

		return $this->throwError(array());
	}

	private function throwError($data)
	{
		if(count($data) === 0) {
			throw new Illuminate\Database\Eloquent\ModelNotFoundException;
		}
	
	}
}