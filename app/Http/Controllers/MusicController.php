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

    	$musics = DownloadCount::all()->sortByDesc('counts')->take('10');

    	return view('pages.home')->with(['genres' => $genres, 'musics' => $musics]);
    }


    // Add music to the database
    // musics, links, download_counts
    public function addMusic(Request $request)
    {
        // Validating User Input
        $this->validate($request, [
            'title' => 'required',
            'artist' => 'required',
            'link' => 'required|active_url',
            'genre' => 'required'
            ]);

        // Passing $request variables value
    	$title = $request['title'];
    	$artist = $request['artist'];
    	$long_link = $request['link'];
    	$genre = $request['genre'];
        $year = $request['year'];

    	$album = $request['album'];

        if($year === '') {
            $year = 0;
        }

    	$music = new Music();

    	$music->title = ucwords($title);
    	$music->artist = ucwords($artist);
    	$music->genre_id = $genre;
    	$music->album = ucwords($album);
    	$music->year = $year;

        // Saving Music to music table
    	if($music->save()) {
	    	$music_id = $music->id;

            // Saving to download_counts, set the counter to 0
            $dl_count = new DownloadCount();
            $dl_count->counts = 0;
            $dl_count->music_id = $music_id;

            $dl_count->save();

            // shortening url and saving to link table
            try {
                $short_link = UrlShortener::driver('bitly')->shorten($long_link);
            }
            catch (Exception $e) {
                $m = Music::find($music_id);
                $m->delete();

                return redirect()->route('add_music_form')->with('error_msg',$e->getMessage());
            }
	    	
	    	$link = new Link();

	    	$link->long_link = $long_link;
	    	$link->short_link = $short_link;
	    	$link->music_id = $music_id;

	    	if($link->save()) {
	    		return redirect()->route('add_music_form')->with('success',ucwords($title) . ' by ' . ucwords($artist) . ' Successfully Added!');
	    	}
	    }

	    return redirect()->route('add_music_form')->with('error_msg','Error Saving Music. Please Try again later.');

    }


    // music download logs and download count
    // download_logs, downlaod_counts
    public function musicDownload($id = null, Request $request)
    {
        $link = Link::find($id);

        // +1 to download count
        $count = DownloadCount::find($link->music->downloadcount->id);

        $count->counts += 1;

        $count->save();

        // Save in download log
        $log = new DownloadLog();

        $music_id = $link->music->id;
        $ip = $request->ip;

        $log->music_id = $music_id;
        $log->ip = $ip;

        $log->save();

        return redirect($link->short_link);

    }


    // Browse by Genre
    public function browseByGenre($id = null, $name = null)
    {
        $genres = Genre::all();

        $musics = Music::where('genre_id', $id)->orderBy('title','asc')->paginate(2);

        return view('pages.browsegenre')->with(['genres' => $genres, 'musics' => $musics, 'g' => $name]);

    }

}
