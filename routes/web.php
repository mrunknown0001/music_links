<?php

/*
|--------------------------------------------------------------------------
| Route File
|--------------------------------------------------------------------------
*/

// This is the route to Home Page of the Application
Route::get('/',[
	'uses' => 'MusicController@loadHomepageItems',
	'as' => 'home'
]);


// Route Post Result, shows the result of the search
Route::post('result', function () {
	return "This the Route Post Search Result.";
})->name('search_result');

// Fix routing, redirect to home page
Route::get('result', function () {
	return redirect()->route('home');
});


// Route to add music/links to the app
Route::get('add', function () {
	return view('pages.add');
});


Route::post('add-music', [
	'uses' => 'MusicController@addMusic',
	'as' => 'add_music'
	]);