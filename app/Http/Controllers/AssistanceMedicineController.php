<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssistanceMedicine;
use App\Medicine;
use App\Assistance;

class AssistanceMedicineController extends Controller
{
     public function edit($id)
    {
        $medicines = Medicine::all();
        $assistance = Assistance::find($id);
        return view ('assistances.editMedicines',['assistance'=>$assistance,'medicines'=>$medicines]);
    }

    public function destroy($id,$medicine)
    {
        AssistanceMedicine::where( [['assistance_id',$id ],['medicine_id',$medicine]])->delete();
        return redirect()->route('assistMedicines.edit',$id);
    }

    public function store($id,Request $request)
    {
    	
    }
}
