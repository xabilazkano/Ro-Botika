<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $patients = Patient::all();
      if (auth()->getUser()->hasRole("admin")) {
        return view ('admin.patients.index',['patients' => $patients]);
      }else{
        return view ('patients.index',['patients' => $patients]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.patients.create');
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
            'ss_number' => 'required|integer|digits:11',
            'name' => 'required',
            'lastname' => 'required',
            'disease' => 'required'
        ]);
        $patient = new Patient;

        $patient->ss_number = $request->input('ss_number');
        $patient->name = $request->input('name');
        $patient->lastname = $request->input('lastname');
        $patient->disease = $request->input('disease');

        $patient->save();

        $patients = Patient::all();

        return view('admin.patients.index',['patients' => $patients]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        if (auth()->getUser()->hasRole("admin")) {
          return view('admin.patients.show',['patient'=>$patient]);
        }else{
          return view('patients.show',['patient'=>$patient]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);

        return view('admin.patients.edit',['patient'=>$patient]);
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
            'ss_number' => 'required|integer|digits:11',
            'name' => 'required',
            'lastname' => 'required',
            'disease' => 'required'
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
        Patient::find($id)->delete();

        $patients = Patient::all();

        return view('admin.patients.index',['patients'=>$patients]);
    }
}
