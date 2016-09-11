<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    // Download count of the music
    public function downloadcount()
    {
    	return $this->hasOne('App\Downloadcount');
    }

    // Link belong to a music
    public function link()
    {
    	return $this->hasOne('App\Link');
    }

    // Genre of the music
    public function genre()
    {
    	return $this->belongsTo('App\Genre');
    }

    // Download Log of the music
    public function download_log()
    {
        return $this->hasMany('App\DownloadLog');
    }

    // 
    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }
}
