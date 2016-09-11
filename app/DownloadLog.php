<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DownloadLog extends Model
{
	public function music()
	{
		return $this->belongsTo('App\Music');
	}   
}
