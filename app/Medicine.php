<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    public function assistances(){
      return $this->hasMany('App\Assistance');
    }
}
