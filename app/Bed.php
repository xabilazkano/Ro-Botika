<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
  public function patients(){
    return $this->belongsToMany('App\Patient');
  }
}
