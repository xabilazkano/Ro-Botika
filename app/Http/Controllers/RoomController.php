<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rooms = Room::all();
      if (auth()->getUser()->hasRole("admin")) {
        return view ('admin.rooms.index',['rooms' => $rooms]);
      }else{
        return view ('rooms.index',['rooms' => $rooms]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rooms.create');
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
            'floor' => 'required|integer',
            'room' => 'required|integer',
            'beds' => 'required|integer'
        ]);

        $floor = $request->input('floor');
        $id = $request->input('room');
        $beds = $request->input('beds');

        Room::insert(['floor'=>$floor,'id'=>$id,'beds'=>$beds]);
        return redirect()->route('rooms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::find($id);
        if (auth()->getUser()->hasRole("admin")) {
          return view('admin.rooms.show',['room'=>$room]);
        }else{
          dd($room);
          return view('rooms.show',['room'=>$room]);
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
        $room = Room::find($id);
        return view('admin.rooms.edit',['room'=>$room]);
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
            'floor' => 'required|integer',
            'room' => 'required|integer',
            'beds' => 'required|integer'
        ]);
        $floor = $request->input('floor');
        $newId = $request->input('room');
        $beds = $request->input('beds');

        Room::find($id)->update(['id'=>$newId,'beds'=>$beds]);
        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::find($id)->delete();
        $rooms = Room::all();
        return redirect()->route('rooms.index');
    }
}
