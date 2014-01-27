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

// Main API Routes

Route::get('scripture/page/{page_id?}', 'HomeController@showScripturePage');

Route::get('scripture/hymn/{hymn_id?}', 'HomeController@showScriptureHymn');

Route::get('scripture/{id?}', 'HomeController@showScriptureLine');

Route::get('translation/page/{page_id?}/{language_id?}', 'HomeController@showTranslationPage');

Route::get('translation/hymn/{hymn_id?}/{language_id?}', 'HomeController@showTranslationHymn');

Route::get('translation/{scripture_id?}/{language_id?}', 'HomeController@showTranslationLine');

Route::get('transliteration/page/{page_id?}/{language_id?}', 'HomeController@showTransliterationPage');

Route::get('transliteration/hymn/{hymn_id?}/{language_id?}', 'HomeController@showTransliterationHymn');

Route::get('transliteration/{scripture_id?}/{language_id?}', 'HomeController@showTransliterationLine');

// Meta API Routes

Route::get('melody', 'HomeController@showMelodies');

Route::get('melody/{id?}', 'HomeController@showMelody');

Route::get('author', 'HomeController@showAuthors');

Route::get('author/{id?}', 'HomeController@showAuthor');

Route::get('language', 'HomeController@showLanguages');

Route::get('language/{id?}', 'HomeController@showLanguage');

// Error Routes

App::error(function(ModelNotFoundException $e)
{
    return Response::view('404', array(), 404);
});

App::missing(function($exception)
{
    return Response::view('404', array(), 404);
});
