<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public function music()
    {
    	return $this->belongsTo('App\Music');
    }
}
