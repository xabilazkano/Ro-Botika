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

/**
* @OA\Info(title="API Carro Automatizado", version="1.0")
*
* @OA\Server(url="http://robotika.ddns.net/")
*/

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
        $assistances = Assistance::all();
        foreach ($assistances as $a) {
          $habitacion = PatientRoom::where([
            ['patient_id', '=', $a->patient_id],
            ['up_date', '<=', date('Y-m-d')]
          ])
          ->where(function ($query) {
            $query->where('down_date', '>=', date('Y-m-d'))
                  ->orWhere('down_date', '=', null);
          })->get();
          $a->room_id = $habitacion[0]->room_id;
        }
        return view ('assistances.index',['assistances' => $assistances]);
      }
    }
    public function indexActualizandose()
    {
      $assistances = Assistance::all();
      return response()->json($assistances, 200);
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
        $assistances = Assistance::all();
        return view('admin.assistances.create',['assistances' => $assistances,'patients'=>$patients,'nurses'=>$nurses,'medicines'=>$medicines]);
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
        $medicinesIds = $request->input('medicines');
        $medicines = array();
        foreach ($medicinesIds as $medicineId) {
            $medicine = Medicine::find($medicineId);
            array_push($medicines,$medicine);
        }
        $assistances = Assistance::all();
        return view('admin.assistances.selectAmount', ['assistances' => $assistances, 'medicines' => $medicines, 'assistance' => $assist]);
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
          $habitacion = PatientRoom::where([
            ['patient_id', '=', $assist->patient_id],
            ['up_date', '<=', date('Y-m-d')]
          ])
          ->where(function ($query) {
            $query->where('down_date', '>=', date('Y-m-d'))
                  ->orWhere('down_date', '=', null);
          })->get();
          $assist->room_id = $habitacion[0]->room_id;

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
    public function ir($id) {
      $asistencias = Assistance::all();
      $ocupado = false;
      foreach ($asistencias as $a) {
        if ($a->chart_state === 1) {
          $ocupado = true;
        }
      }
      if (!$ocupado) {
        $assist = Assistance::find($id);
        $assist->chart_state = 1;
        $assist->save();
      }
      return redirect()->route('assistances.show', $assist->id);
    }

    /**
    * @OA\Get(
    *     path="/api/siguienteHabitacion",
    *     summary="Mostrar el ńumero de la siguiente habitación. Si no hay ninguna habitación seleccionada, devolverá 0.",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrado correctamente el ńumero de la siguiente habitación. Si no había ninguna habitación seleccionada, habrá devuelto 0."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function estadocarro() {
      $asistencia = Assistance::select('patient_id','chart_state')->where('chart_state', 1)->get();
      if (isset($asistencia[0])) {
        $habitacion = PatientRoom::select('room_id')->where('patient_id', $asistencia[0]->patient_id)->get();
        return response()->json($habitacion[0],200);
      } else {
        $habitacionNula = new PatientRoom;
        $habitacionNula->room_id = 0;
        return response()->json($habitacionNula,203);
      }
    }

    /**
    * @OA\Get(
    *     path="/api/llegada/{habitacion}",
    *     summary="Notificar que el carro ha llegado a la habitación indicada.",
    *     @OA\Parameter(
    *       name="habitacion",
    *       required=true,
    *       description="El ID de la habitación.",
    *       in="path",
    *       @OA\Schema(
    *         type="integer"
    *       )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Notificado correctamente que el carro ha llegado a la habitación indicada."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */
    public function llegada($habitacion) {
      $asistencia = Assistance::select('patient_id','chart_state')->where('chart_state', 1)->get();
      if (isset($asistencia[0])) {
        $patientRoom = PatientRoom::select('room_id')->where('patient_id', $asistencia[0]->patient_id)->get();
        if ($habitacion == $patientRoom[0]["room_id"]){
          $assistance = Assistance::all();
          foreach ($assistance as $a) {
            $a->chart_state = 0;
            $a->save();
          }
          $respuesta = (object) array('estado' => 'ok');
          return response()->json($respuesta,200);
        }
      }else{
        return response()->json("No es la habitación del destino",203);
      }
    }

}
