<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  public function assistances(){
    return $this->hasMany('App\Assistance');
  }

  public function beds(){
    return $this->hasMany('App\Bed');
  }
}
