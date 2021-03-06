<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientRoom;
use App\Room;
use App\Medicine;
use App\Assistance;

class GraphicController extends Controller
{
  public function graficas()
  {
    $rooms = PatientRoom::where([['up_date','<=',date('Y-m-d')],['down_date','=',null]])->count();
    $quantity = Room::count();
    $quantity = $quantity*2;

    $occupied = $rooms*100/$quantity;
    $free = 100-$occupied;

    $medicines = Medicine::all();

    return view ('admin.statistics',['occupied' => $occupied,'free' => $free,'medicines' => $medicines]);
  }

  public function confirmedAssistances($date) {
    $total = Assistance::where('estimated_date','=',$date)->count();
    $confirmed = Assistance::where([
      ['estimated_date','=',$date],
      ['confirmed','=',1]
    ])->count();

    if ($total !== 0) {
      if ($confirmed === 0) {
        return 0;
      } else {
        $percentage = $confirmed*100/$total;
        return $percentage;
      }
    } else {
      return 'noregistros';
    }
  }
}
