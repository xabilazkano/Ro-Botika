<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Assistance;
use App\Patient;
use App\User;
use App\Medicine;
use App\AssistanceMedicine;
use App\Http\Requests\addAssistance;
use App\PatientRoom;

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
        $patients = Patient::all();
        $medicines = Medicine::all();
        $nurses = User::where('type_of_user','nurse')->get();
        return view('admin.assistances.create',['patients'=>$patients,'nurses'=>$nurses,'medicines'=>$medicines]);
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
            'nurse' => 'required',
            'date' => 'required',
            'medicines' => 'required'
        ]);
        $assist = new Assistance;
        $assist->patient_id = $request->input('patient');
        $assist->user_id = $request->input('nurse');
        $assist->estimated_date = $request->input('date');
        $assist->save();
        $id = $assist->id;
        $medicines = $request->input('medicines');
        $i=0;
        while ($i<count($medicines)) {
            $assist = new AssistanceMedicine;
            $assist->assistance_id = $id;
            $assist->medicine_id = $medicines[$i];
            $assist->save();
            $i++;
        }
        return redirect()->route('assistances.index');
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
        if (auth()->getUser()->hasRole("admin")) {
          return view ('admin.assistances.show',['assist'=>$assist]);
        }else{
          return view ('assistances.show',['assist'=>$assist]);
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

        $assistance = Assistance::find($id);
        $patients = Patient::all();
        $nurses = User::where('type_of_user','nurse')->get();
        return view('admin.assistances.edit',['assistance'=>$assistance,'patients'=>$patients,'nurses'=>$nurses]);


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
            'nurse' => 'required',
            'date' => 'required'
        ]);
        $assistance = Assistance::find($id);
        $assistance->patient_id = $request->input('patient');
        $assistance->user_id = $request->input('nurse');
        $assistance->estimated_date = $request->input('date');
        $assistance->id = $id;
        $assistance->save();
        $assistances = Assistance::all();
        return redirect()->route('assistances.index');
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
        return redirect()->route('assistances.index');
    }
    public function confirmAssist($id)
    {
        Assistance::where('id',$id)->update(['confirmed'=>1]);
        $assistances = Assistance::all();
        return redirect()->route('assistances.index');

    }
    public function siguienteHabitacion($id)
    {
      $assist = Assistance::find($id);
      return view ('admin.assistances.show',['assist'=>$assist]);
    }

    public function estadocarro() {
      $asistencia = Assistance::select('patient_id','chart_state')->where('chart_state', 1)->get();
      if (isset($asistencia[0])) {
        $habitacion = PatientRoom::select('room_id')->where('patient_id', $asistencia[0]->patient_id)->get();
        return $habitacion[0]["room_id"];
      } else {
        return null;
      }
    }

    public function llegada($habitacion) {
      $asistencia = Assistance::select('patient_id','chart_state')->where('chart_state', 1)->get();
      if (isset($asistencia[0])) {
        $habitacionLlegada = PatientRoom::select('room_id')->where('patient_id', $asistencia[0]->patient_id)->get();
        if ($habitacion == $habitacionLlegada[0]["room_id"]){
          $assistance = Assistance::all();
          foreach ($assistance as $a) {
            $a->chart_state = 0;
            $a->save();
          }
        }
      }
    }

}
