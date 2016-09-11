<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DownloadCount extends Model
{
	// downloadcount belongs to music
    public function music()
    {
    	return $this->belongsTo('App\Music');
    }
}
