<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	public function patients(){
		return $this->belongsToMany('App\Patient')->withPivot('id','up_date', 'down_date','bed');
	}
}
