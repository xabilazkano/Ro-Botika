<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PatientRoom;
use App\Room;
use App\Medicine;

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
}