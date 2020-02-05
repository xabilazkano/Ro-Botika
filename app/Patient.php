<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  public function assistances(){
    return $this->hasMany('App\Assistance');
  }

  public function rooms(){
    return $this->belongsToMany('App\Room')->withPivot('up_date', 'down_date','bed','room_id','disease','id');
  }
}
