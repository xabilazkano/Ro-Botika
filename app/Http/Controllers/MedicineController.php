<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Medicine;
class MedicineController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $medicines = Medicine::all();
        return view('medicines.index',['medicines'=>$medicines]);
    }
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('medicines.create');
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
            'name' => 'required',
            'amount' => 'required|integer'
        ]);

        $medicine = new Medicine;
        $medicine->name = $request->input('name');
        $medicine->amount = intval($request->input('amount'));
        $medicine->save();
        $medicines = Medicine::all();
        return view('medicines.index',['medicines'=>$medicines]);
    }
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $medicine = Medicine::find($id);
        return view('medicines.show',['medicine'=>$medicine]);
    }
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $medicine = Medicine::find($id);
        return view('medicines.edit',['medicine'=>$medicine]);
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
            'name' => 'required',
            'amount' => 'required|integer'
        ]);

        $medicine = Medicine::find($id);
        $medicine->name = $request->input('name');
        $medicine->amount = intval($request->input('amount'));
        $medicine->save();
        $medicines = Medicine::all();
        return view('medicines.index',['medicines' => $medicines]);
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        Medicine::find($id)->delete();
        $medicines = Medicine::all();
        return view('medicines.index',['medicines'=>$medicines]);
    }
}