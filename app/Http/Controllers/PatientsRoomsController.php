<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\PatientRoom;
use App\Patient;

class PatientsRoomsController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $rooms = Room::all();
    return view ('admin.patientsrooms.index',['rooms' => $rooms]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $rooms = Room::all();
    $patients = Patient::all();
    return view ('admin.patientsrooms.create',['patients' => $patients,'rooms'=>$rooms]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'patient' => 'required',
      'room' => 'required',
      'bed' => 'required',
      'desde' => 'required',
      'hasta' => 'required|after:desde'
    ]);
    $patientroom = new PatientRoom;

    $patientroom->patient_id = $request->input('patient');
    $patientroom->room_id = $request->input('room');
    $patientroom->bed = $request->input('bed');
    $patientroom->up_date = $request->input('desde');
    $patientroom->down_date = $request->input('hasta');

    $patientroom->save();

    return redirect()->route('adminPatientsRooms.index');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $patientroom = PatientRoom::find($id);
    $room = Room::find($patientroom->room_id);
    return view('admin.patientsrooms.show',['patientroom' => $patientroom,'room'=>$room]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $rooms = Room::all();
    $patients = Patient::all();
    $patientroom = PatientRoom::find($id);

    return view('admin.patientsrooms.edit',['rooms' => $rooms,'patients' => $patients,'patientroom' => $patientroom]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    $validatedData = $request->validate([
      'patient' => 'required',
      'room' => 'required',
      'bed' => 'required',
      'desde' => 'required',
      'hasta' => 'required|after:desde'
    ]);
    $patientroom = PatientRoom::find($id);

    $patientroom->patient_id = $request->input('patient');
    $patientroom->room_id = $request->input('room');
    $patientroom->bed = $request->input('bed');
    $patientroom->up_date = $request->input('desde');
    $patientroom->down_date = $request->input('hasta');

    $patientroom->save();

    return redirect()->route('adminPatientsRooms.index');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    PatientRoom::find($id)->delete();
    return redirect()->route('adminPatientsRooms.index');

  }
}
