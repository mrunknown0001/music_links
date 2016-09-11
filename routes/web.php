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


// Route to Login Form of the app
Route::get('L', function () {
	return "Login Page Here";
});


// Route Request Reset Password
Route::get('L/pass/reset', function () {
	return "Password Reset Method Here. Send in email";
});


// Route to get download, add log and count
Route::get('music-download/{id}', [
	'uses' => 'MusicController@musicDownload',
	'as' => 'music_download'
	]);





// Group Route browse
Route::group(['prefix' => 'browse'], function () {

	// Route to browse music by genre
	Route::get('genre/{id}/{genre?}', [
		'uses' => 'MusicController@browseByGenre',
		'as' => 'browse_by_genre'
		]);


	// Route to brose music by artists
	Route::get('artist/{id}/{name?}', [
		'uses' => 'MusicController@browseByArtist',
		'as' => 'browse_by_artist'
		]);
});


// Group Route u
Route::group(['prefix' => 'u'], function () {

	// Home Route in group u
	Route::get('/', function () {
		return view('pages.u.dashboard');
	})->name('dashboard');


	// Route to add music/links form of the app
	Route::get('add-music', function () {
		return view('pages.u.add');
	})->name('add_music_form');

	// Route to add music
	Route::post('add-music', [
		'uses' => 'MusicController@addMusic',
		'as' => 'add_music'
		]);
});
