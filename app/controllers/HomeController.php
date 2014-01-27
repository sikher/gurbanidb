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

	public function showHome()
	{
		return View::make('index');
	}

	public function showAbout()
	{
		return Response::json(Array('name'=>'GurbaniDB','version'=>'2.0'));
	}

	public function showScripturePage($page_id = 1)
	{
		$data = Scripture::where('page', '=', $page_id)->get();

		if(count($data) === 0) {
			throw new Illuminate\Database\Eloquent\ModelNotFoundException;
		}

		return Response::json($data);
	}

	public function showScriptureHymn($hymn_id = 1)
	{
		// Return the given hymn in the scripture
		$data = Scripture::where('hymn', '=', $hymn_id)->get();

		if(count($data) === 0) {
			throw new Illuminate\Database\Eloquent\ModelNotFoundException;
		}

		foreach($data as $hymn){
			$hymn['melody'] = json_decode((String)Scripture::find($hymn->id)->melody);
			$hymn['author'] = json_decode((String)Scripture::find($hymn->id)->author);
			$hymn['language'] = json_decode((String)Scripture::find($hymn->id)->language);
		}
		
		return Response::json($data);
	}

	public function showScriptureLine($id = 1)
	{
		// Return the given line in the scripture
		$data = Scripture::where('id', '=', $id)->firstOrFail();
		$data['melody'] = json_decode((String)Scripture::find($id)->melody);
		$data['author'] = json_decode((String)Scripture::find($id)->author);
		$data['language'] = json_decode((String)Scripture::find($id)->language);

		return Response::json($data);
	}

	public function showTranslationPage($page_id = 1, $language_id = 1)
	{
		$data = Scripture::where('page', '=', $page_id)->get();

		if(count($data) === 0) {
			throw new Illuminate\Database\Eloquent\ModelNotFoundException;
		}

		foreach($data as $line) {
			$line['translation'] = json_decode((String)Translation::whereRaw("scripture_id = {$line->id} and language_id = {$language_id}")->firstOrFail());
		}
		
		return Response::json($data);
	}

	public function showTranslationHymn($hymn_id = 1, $language_id = 1)
	{
		$data = Scripture::where('hymn', '=', $hymn_id)->get();

		if(count($data) === 0) {
			throw new Illuminate\Database\Eloquent\ModelNotFoundException;
		}

		foreach($data as $line) {
			$line['translation'] = json_decode((String)Translation::whereRaw("scripture_id = {$line->id} and language_id = {$language_id}")->firstOrFail());
		}
		
		return Response::json($data);
	}

	public function showTranslationLine($scripture_id = 1, $language_id = 1)
	{
		$data = Translation::whereRaw("scripture_id = {$scripture_id} and language_id = {$language_id}")->firstOrFail();
		$data['scripture'] = json_decode((String)Translation::find($data->id)->scripture);
		$data['language'] = json_decode((String)Translation::find($data->id)->language);
		
		return Response::json($data);
	}

	public function showTransliterationPage($page_id = 1, $language_id = 55)
	{
		$data = Scripture::where('page', '=', $page_id)->get();

		if(count($data) === 0) {
			throw new Illuminate\Database\Eloquent\ModelNotFoundException;
		}

		foreach($data as $line) {
			$line['transliteration'] = json_decode((String)Transliteration::whereRaw("scripture_id = {$line->id} and language_id = {$language_id}")->firstOrFail());
		}
		
		return Response::json($data);
	}

	public function showTransliterationHymn($hymn_id = 1, $language_id = 55)
	{
		$data = Scripture::where('hymn', '=', $hymn_id)->get();

		if(count($data) === 0) {
			throw new Illuminate\Database\Eloquent\ModelNotFoundException;
		}

		foreach($data as $line) {
			$line['transliteration'] = json_decode((String)Transliteration::whereRaw("scripture_id = {$line->id} and language_id = {$language_id}")->firstOrFail());
		}
		
		return Response::json($data);
	}

	public function showTransliterationLine($scripture_id = 1, $language_id = 55)
	{
		$data = Transliteration::whereRaw("scripture_id = {$scripture_id} and language_id = {$language_id}")->firstOrFail();
		$data['scripture'] = json_decode((String)Transliteration::find($data->id)->scripture);
		$data['language'] = json_decode((String)Transliteration::find($data->id)->language);
		
		return Response::json($data);
	}

	public function showMelodies()
	{
		$data = Melody::all();

		if(count($data) === 0) {
			throw new Illuminate\Database\Eloquent\ModelNotFoundException;
		}

		return Response::json($data);
	}

	public function showMelody($id = 1)
	{
		$data = Melody::where('id', '=', $id)->firstOrFail();

		return Response::json($data);
	}

	public function showAuthors()
	{
		$data = Author::all();

		if(count($data) === 0) {
			throw new Illuminate\Database\Eloquent\ModelNotFoundException;
		}

		return Response::json($data);
	}

	public function showAuthor($id = 1)
	{
		$data = Author::where('id', '=', $id)->firstOrFail();

		return Response::json($data);
	}

	public function showLanguages()
	{
		$data = Language::all();

		if(count($data) === 0) {
			throw new Illuminate\Database\Eloquent\ModelNotFoundException;
		}

		return Response::json($data);
	}

	public function showLanguage($id = 1)
	{
		$data = Language::where('id', '=', $id)->firstOrFail();

		return Response::json($data);
	}

}