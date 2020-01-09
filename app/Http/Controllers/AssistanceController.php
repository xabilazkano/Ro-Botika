<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assistance;
use App\Patient;
use App\User;
use App\Medicine;

class AssistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $assistances = Assistance::all();
      if (auth()->getUser()->hasRole("admin")) {
        return view ('admin.assistances.index',['assistances' => $assistances]);
      }else{
        return view ('assistances.index',['assistances' => $assistances]);
      }
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
        $assist = Assistance::find($id);

        return view ('assistances.show',['assist'=>$assist]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assistance = Assistance::find($id);
        $patients = Patient::all();
        $nurses = User::where('type_of_user','standar')->get();

        return view('assistances.edit',['assistance'=>$assistance,'patients'=>$patients,'nurses'=>$nurses]);
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
        $assistance = Assistance::find($id);
        $assistance->patient_id = $request->input('patient');
        $assistance->user_id = $request->input('nurse');
        $assistance->estimated_date = $request->input('date');
        $assistance->id = $id;
        $assistance->save();

        $assistances = Assistance::all();
        return view ('assistances.index',['assistances' => $assistances]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Assistance::where('id',$id)->delete();
        $assistances = Assistance::all();

        return view ('assistances.index',['assistances' => $assistances]);
    }

    public function confirmAssist($id)
    {
        Assistance::where('id',$id)->update(['confirmed'=>1]);

        $assistances = Assistance::all();

        return view ('assistances.index',['assistances' => $assistances]);
    }


}
