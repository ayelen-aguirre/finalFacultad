<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Examen;
use App\Models\Carrera;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ExamenController extends Controller
{
    public function index($page = 6)
    {
        $carreras = Carrera::paginate($page);
        return view('Examen.index')->with('carreras', $carreras);
    }

    public function create()
    {
        return ;
    }

    public function store(Request $request)
    {
        return ;
    }

    public function show($id)
    {
        return view('');
    }

    public function edit($id)
    {
        $carrera = Carrera::findOrFail($id);
        $examen =  Examen::where('carrera_id', $id)->get();
        $materia1 = Materia::where(['carrera_id' => $id, 'anio'=> 0 ])->pluck('materia', 'id');
        $materia2 = Materia::where(['carrera_id' => $id, 'anio'=> 1 ])->pluck('materia', 'id');
        $materia3 = Materia::where(['carrera_id' => $id, 'anio'=> 2 ])->pluck('materia', 'id');
        $users = User::Where(['rol_id' => 1, 'rol_id' => 3]);
        $user = User::where(['rol_id' => 1])->orWhere(['rol_id' => 3])->pluck('name', 'id');
        return view('Examen.edit', compact('examen', 'materia1', 'materia2', 'materia3', 'user', 'users','carrera'));
    }

    public function update(Request $request, $id)
    {

        $carrera = Carrera::findOrFail($id);
        $materia1 = Materia::where(['carrera_id' => $id, 'anio'=> 0 ])->pluck('materia', 'id');
        $materia2 = Materia::where(['carrera_id' => $id, 'anio'=> 1 ])->pluck('materia', 'id');
        $materia3 = Materia::where(['carrera_id' => $id, 'anio'=> 2 ])->pluck('materia', 'id');

        $materias = [$materia1, $materia2, $materia3];
 
        for ($i = 0; $i < 3; $i++) {
            foreach ($materias[$i] as $key => $materia) { // $i -> anio 
                $e = Examen::where(['carrera_id' => $id, 'anio' => $i, 'materia_id' => $key])->first();
                
                // Obtener la fecha del formulario
                $fecha = $request->input("fecha$key");
                
                // Verificar si la fecha no es fin de semana (sábado o domingo)
                $timestamp = strtotime($fecha);
                $diaSemana = date('w', $timestamp); // 0 para domingo, 6 para sábado
                
                if ($diaSemana != 0 && $diaSemana != 6) {
                    // Si no es fin de semana, actualizar la fecha y otros campos
                    $e->fecha = $fecha;
                    $e->vocal1 = $request->input("vocal1$key");
                    $e->vocal2 = $request->input("vocal2$key");
                    $e->vocal3 = $request->input("vocal3$key");
                    $e->save();
                
                } else {
                    
                $request->session()->flash('status', "Las fechas de exámenes no pueden ser fin de semana");
                return redirect()->action([ExamenController::class, 'index']);
                } 

                // Consulta profesores vocales repetidos
                $e = [$e->vocal1, $e->vocal2, $e->vocal3];
                if (count(array_unique($e)) !== count($e)) {
                    $request->session()->flash('status', "Los profesores vocales no pueden repetirse"); 
                    return redirect()->action([ExamenController::class, 'index']); 

                } else {
                 
                $request->session()->flash('status', "Se actualizó correctamente los finales de $carrera->carrera");
                return redirect()->action([ExamenController::class, 'index']);
                }
            }
        }                
    }
    public function destroy($id)
    {
        return ;
    }
}
