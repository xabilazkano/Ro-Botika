<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
  public function user(){
    return $this->belongsTo('App\User');
  }

  public function patient(){
    return $this->belongsTo('App\Patient');
  }

  public function medicines(){
    return $this->belongsToMany('App\Medicine');
  }
}
