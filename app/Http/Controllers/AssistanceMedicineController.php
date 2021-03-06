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
		$assist = Assistance::find($id);
		$assistances = Assistance::all();

		$medicinesAvailable = array();
		foreach ($medicines as $medicine){
			$medicineAdded = false;
			foreach ($assist->medicines as $assistMedicine) {
				if ($assistMedicine->id === $medicine->id){
					$medicineAdded = true;
				}
			}
			if (!$medicineAdded){
				array_push($medicinesAvailable, $medicine);
			}
		}
		return view ('admin.assistances.editMedicines',['assistances' => $assistances, 'assistance'=>$assist,'medicines'=>$medicinesAvailable]);
	}

	public function selectAmount(Request $request){
		$validatedData = $request->validate([
				'patient' => 'required',
				'nurse' => 'required',
				'date' => 'required',
				'hour' => 'required',
		]);

		$input = $request->all();

		$assistance = new Assistance;
		$assistance->patient_id = $input["patient"];
		$assistance->user_id = $input["nurse"];
		$assistance->estimated_date = $input["date"];
		$assistance->hour = $input["hour"];
		$assistance->save();

		foreach ($input as $medicineId => $medicineAmount) {
			if ($medicineId !== "_token" && $medicineId !== "patient" && $medicineId !== "nurse" && $medicineId !== 'hour' && $medicineId !== "date"){
				$assistanceMedicine = new AssistanceMedicine;
				$assistanceMedicine->assistance_id = $assistance->id;
				$assistanceMedicine->medicine_id = $medicineId;
				$assistanceMedicine->amount = $medicineAmount;
				$assistanceMedicine->save();
			}
		}

		$assistances = Assistance::all();
		return view ('admin.assistances.index',['assistances' => $assistances]);
	}

	public function selectAmountEdit(Request $request, $id){
		$validatedData = $request->validate([
				'patient' => 'required',
				'nurse' => 'required',
				'date' => 'required',
				'hour' => 'required'
		]);

		$assist = Assistance::find($id);
		$assist->patient_id = $request->input('patient');
		$assist->user_id = $request->input('nurse');
		$assist->estimated_date = $request->input('date');
		$assist->save();
		$medicinesIds = $request->input('medicines');

		foreach ($medicinesIds as $medicineId) {
				$medicine = Medicine::find($medicineId);
				$assistanceMedicine = new AssistanceMedicine;
				$assistanceMedicine->assistance_id = $assist->id;
				$assistanceMedicine->medicine_id = $medicineId;
				$assistanceMedicine->amount = 0;
				$assistanceMedicine->save();
		}
		$medicines = Medicine::all();

		$medicinesAvailable = array();
		foreach ($medicines as $medicine){
			$medicineAdded = false;
			foreach ($assist->medicines as $assistMedicine) {
				if ($assistMedicine->id === $medicine->id){
					$medicineAdded = true;
				}
			}
			if (!$medicineAdded){
				array_push($medicinesAvailable, $medicine);
			}
		}

		$assistances = Assistance::all();

		return view('admin.assistances.editMedicines', ['assistances' => $assistances, 'medicines' => $medicinesAvailable, 'assistance' => $assist]);
	}

	public function update(Request $request, $assistanceId){
		$input = $request->all();
		foreach ($input as $medicineId => $medicineAmount) {
			if ($medicineId !== "_token" && $medicineId !== "_method"){
				$assistanceMedicine = AssistanceMedicine::where([['assistance_id', $assistanceId],['medicine_id', $medicineId]])->get();
				$assistanceMedicine = AssistanceMedicine::find($assistanceMedicine[0]->id);
				if ($medicineAmount == 0){
					AssistanceMedicine::find($assistanceMedicine->id)->delete();
				}else{
					$assistanceMedicine->amount = $medicineAmount;
				}
				if (Assistance::find($assistanceId)->medicines->isEmpty()){
					Assistance::find($assistanceId)->delete();
				}else{
					$assistanceMedicine->assistance_id = $assistanceId;
					$assistanceMedicine->medicine_id = $medicineId;
					$assistanceMedicine->save();
				}
			}
		}

		$assistances = Assistance::all();
		return view ('admin.assistances.index',['assistances' => $assistances]);
	}
}
