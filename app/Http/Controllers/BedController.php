<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bed;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beds = Bed::all();
        return view('beds.index',['beds'=>$beds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $floor = $request->input('floor');
        $room = $request->input('room');
        $bed = $request->input('bed');

        Bed::insert(['floor'=>$floor,'room'=>$room,'bed'=>$bed]);
        return view('beds.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bed = Bed::where('id',$id)->get();
        return view('beds.show',['bed'=>$bed]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('beds.edit');
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
        $floor = $request->input('floor');
        $room = $request->input('room');
        $bed = $request->input('bed');

        Bed::where('id',$id)->update(['floor'=>$floor,'room'=>$room,'bed'=>$bed]);
        return view('beds.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bed::where('id',$id)->delete();
        return view('beds.index');
    }
}
