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
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
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
        'hasta' => 'requiered'
    ]);
    $patient = Patient::find($id);

    $patient->ss_number = $request->input('ss_number');
    $patient->name = $request->input('name');
    $patient->lastname = $request->input('lastname');
    $patient->disease = $request->input('disease');

    $patient->save();

    $patients = Patient::all();

    return view('admin.patients.index',['patients' => $patients]);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
