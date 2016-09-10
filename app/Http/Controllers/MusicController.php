<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Genre;

use App\Music;

use App\DownloadCount;

use App\Link;

use App\DownloadLog;

use Waavi\UrlShortener\Facades\UrlShortener;

class MusicController extends Controller
{
    
    // Load the list of Genre from database passed to homepage
    // Load Most Downloaded: 8
    public function loadHomepageItems()
    {
    	$genres = Genre::all();

    	$musics = DownloadCount::all()->sortByDesc('count')->take('10');

    	return view('pages.home')->with(['genres' => $genres, 'musics' => $musics]);
    }


    // Add music to the database
    public function addMusic(Request $request)
    {

    	$title = $request['title'];
    	$artist = $request['artist'];
    	$long_link = $request['link'];
    	$genre = $request['genre'];

    	$album = $request['album'];
    	$year = $request['year'];

    	$music = new Music();

    	$music->title = $title;
    	$music->artist = $artist;
    	$music->genre_id = $genre;
    	$music->album = $album;
    	$music->year = $year;


    	if($music->save()) {
	    	$music_id = $music->id;
	    	$short_link = UrlShortener::driver('bitly')->shorten($long_link);
	    	$link = new Link();

	    	$link->long_link = $long_link;
	    	$link->short_link = $short_link;
	    	$link->music_id = $music_id;

	    	if($link->save()) {
	    		return "Successfully Added Music!";
	    	}
	    }

	    return "Error Saving Music. Please Try again later.";

    }

}
