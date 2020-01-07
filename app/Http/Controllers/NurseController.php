<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nurses = User::all()->where('type_of_user','nurse');

        return view('nurses.index',['nurses' => $nurses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nurses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nurse = new User;

        $nurse->name = $request->input('name');
        $nurse->lastname = $request->input('lastname');
        $nurse->email = $request->input('email');
        $nurse->phone_number = $request->input('phone_number');

        $nurse->save();

        $nurses = User::all()->where('type_of_user','nurse');

        return view('nurses.index',['nurses' => $nurses]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nurse = User::find($id);

        return view('nurses.edit',['nurse' => $nurse]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $nurse = User::find($id);

      return view('nurses.edit',['nurse' => $nurse]);
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
        $nurse = User::find($id);

        $nurse->name = $request->input('name');
        $nurse->lastname = $request->input('lastname');
        $nurse->email = $request->input('email');
        $nurse->phone_number = $request->input('phone_number');

        $nurse->save();

        $nurses = User::all()->where('type_of_user','nurse');

        return view('nurses.index',['nurses' => $nurses]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        $nurses = User::all()->where('type_of_user','nurse');

        return view('nurses.index',['nurses' => $nurses]);
    }
}
