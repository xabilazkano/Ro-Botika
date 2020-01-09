<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assistance;

class AdminController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware(['auth','verified','role']);
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $assistances = Assistance::all();

    return view('admin.assistances.index',['assistances' => $assistances]);
  }
}
