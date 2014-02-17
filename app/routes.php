<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;				

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// General Routes

Route::get('/', 'HomeController@showHome');

Route::get('about', 'HomeController@showAbout');

// Meta API Routes

Route::get('melody', 'HomeController@showMelodies');

Route::get('melody/{id?}', 'HomeController@showMelody');

Route::get('author', 'HomeController@showAuthors');

Route::get('author/{id?}', 'HomeController@showAuthor');

Route::get('language', 'HomeController@showLanguages');

Route::get('language/{id?}', 'HomeController@showLanguage');

// Search API Routes

Route::get('search/0/{search?}/{translation?}/{transliteration?}/{offset?}', 'HomeController@showSearchScriptureFirstLettersStart');

Route::get('search/1/{search?}/{translation?}/{transliteration?}/{offset?}', 'HomeController@showSearchScriptureFirstLettersAnywhere');

Route::get('search/2/{search?}/{translation?}/{transliteration?}/{offset?}', 'HomeController@showSearchScriptureWords');

Route::get('search/3/{search?}/{translation?}/{transliteration?}/{offset?}', 'HomeController@showSearchTranslationWords');

Route::get('search/4/{search?}/{translation?}/{transliteration?}/{offset?}', 'HomeController@showSearchTransliterationWords');

Route::get('search/{search?}/{translation?}/{transliteration?}/{offset?}', 'HomeController@showSearchScriptureFirstLettersStart');

// Main API Routes

Route::get('page/{page_id?}/{translation?}/{transliteration?}', 'HomeController@showAllPage');

Route::get('hymn/{hymn_id?}/{translation?}/{transliteration?}', 'HomeController@showAllHymn');

Route::get('random/{type?}/{translation?}/{transliteration?}', 'HomeController@showRandom');

Route::get('{scripture_id?}/{translation?}/{transliteration?}', 'HomeController@showAllLine');

// Error Routes

App::error(function(ModelNotFoundException $e)
{
    return Response::view('404', array(), 404);
});

App::missing(function($exception)
{
    return Response::view('404', array(), 404);
});
