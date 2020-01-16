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
    $patientsRooms = PatientRoom::all();
    $rooms = Room::all();
    $patients = Patient::all();
    return view ('admin.patientsrooms.create',['patients' => $patients,'rooms'=>$rooms, 'patientsRooms' => $patientsRooms]);
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
      'desde' => 'required',
      'hasta' => 'required|after:desde'
    ]);

    $patient_room = new PatientRoom;

    $patient_room->patient_id = $request->input('patient');
    $patient_room->room_id = $request->input('room');
    $patient_room->up_date = $request->input('desde');
    $patient_room->down_date = $request->input('hasta');

    $patient_room->save();

    $patientsRooms = PatientRoom::all();

    return view ('admin.patientsrooms.selectBed',['patient_room' => $patient_room, 'patientsRooms' => $patientsRooms]);
  }

  public function bedAdd(Request $request, $patient_room_id){
    $patient_room = PatientRoom::find($patient_room_id);

    $patient_room->bed = $request->input('bed');

    $patient_room->save();

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
    $patientsRooms = PatientRoom::all();

    return view('admin.patientsrooms.edit',['rooms' => $rooms,'patients' => $patients,'patientroom' => $patientroom,'patientsRooms' => $patientsRooms]);
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
      'desde' => 'required',
      'hasta' => 'required|after:desde'
    ]);
    $patient_room = PatientRoom::find($id);

    $patient_room->patient_id = $request->input('patient');
    $patient_room->room_id = $request->input('room');
    $patient_room->up_date = $request->input('desde');
    $patient_room->down_date = $request->input('hasta');

    $patient_room->save();

    $patientsRooms = PatientRoom::all();

    return view ('admin.patientsrooms.selectBed',['patient_room' => $patient_room, 'patientsRooms' => $patientsRooms]);
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
