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

	public $about = Array('name'=>'GurbaniDB','version'=>'2.1');

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

	// Main API Routes

	public function showAllPage($page_id = 1, $translation = 1, $transliteration = 55)
	{
		$data = Scripture::page($page_id)->get();

		foreach($data as $line) {
			$line['translation'] = Translation::only($line->id,$translation)->firstOrFail()->toArray();
			$line['transliteration'] = Transliteration::only($line->id,$transliteration)->firstOrFail()->toArray();
		}

		$this->throwError($data);

		return Response::json($data);
	}

	public function showAllHymn($hymn_id = 1, $translation = 1, $transliteration = 55)
	{
		$data = Scripture::hymn($hymn_id)->get();

		foreach($data as $line) {
			$line['translation'] = Translation::only($line->id,$translation)->firstOrFail()->toArray();
			$line['transliteration'] = Transliteration::only($line->id,$transliteration)->firstOrFail()->toArray();
		}

		$this->throwError($data);

		return Response::json($data);
	}

	public function showAllLine($scripture_id = 1, $translation = 1, $transliteration = 55)
	{
		$data = Scripture::line($scripture_id)->firstOrFail();

		$data['translation'] = Translation::only($data->id,$translation)->firstOrFail()->toArray();
		$data['transliteration'] = Transliteration::only($data->id,$transliteration)->firstOrFail()->toArray();

		$this->throwError($data);

		return Response::json($data);
	}

	private function throwError($data)
	{
		if(count($data) === 0) {
			throw new Illuminate\Database\Eloquent\ModelNotFoundException;
		}
	
	}
}