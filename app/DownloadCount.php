<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DownloadCount extends Model
{
    public function music()
    {
    	return $this->hasOne('App\Music');
    }
}
