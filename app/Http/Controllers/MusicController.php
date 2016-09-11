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

use App\Artist;

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

        $artist_a = Artist::where('name', '=', ucwords($artist))->first();

        if(!empty($artist_a)) {
            // if existing
            // Nothing to do here, just get the id of the artist
            $artist_id = $artist_a->id;
        }
        else {
            // if not exist
            // add the artist to the artists table
            $a = new Artist();

            $a->name = ucwords($artist);

            $a->save();
        }


        // Create new instance for Music
    	$music = new Music();

    	$music->title = ucwords($title);
    	$music->artist_id = 1;
    	$music->genre_id = $genre;
    	$music->album = ucwords($album);
    	$music->year = $year;

        // Saving Music to music table
    	if($music->save()) {
	    	$music_id = $music->id;

            // Saving to download_counts, set the counter to 0
            // Create new instance for DownloadCount
            $dl_count = new DownloadCount();
            $dl_count->counts = 0;
            $dl_count->music_id = $music_id;

            $dl_count->save();

            // shortening url and saving to link table
            try {
                $short_link = UrlShortener::driver('bitly')->shorten($long_link);
            }
            catch (Exception $e) {
                // Create instance for Music 
                $m = Music::find($music_id);
                $m->delete();

                return redirect()->route('add_music_form')->with('error_msg',$e->getMessage());
            }
	    	
            // Create new instance for Link
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
        // Create new instance for DownloadLog
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

        $musics = Music::where('genre_id', $id)->orderBy('title','asc')->paginate(10);

        return view('pages.browsegenre')->with(['genres' => $genres, 'musics' => $musics, 'g' => $name]);

    }


    // Browse by Artist
    public function browseByArtist($id = null, $artist = null)
    {
        $artist = Artist::find($id);

        $musics = Music::where('artist_id', '=', $artist->id)->paginate(10);

        $genres = Genre::all();

        return view('pages.browsebyartist')->with(['artist' => $artist, 'genres' => $genres, 'musics' => $musics]);

    }

}