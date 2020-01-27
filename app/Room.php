<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
	protected $fillable = ['id'];

	public function patients(){
		return $this->belongsToMany('App\Patient');
	}
}
