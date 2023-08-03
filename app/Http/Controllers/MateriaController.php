<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use App\Models\Carrera;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MateriaController extends Controller
{
    public function index($page = 6){
        $materias = Materia::paginate($page);
        return view('Materia.index', compact('materias'));
    }


    public function create()
    {
        $carreras = Carrera::pluck('carrera', 'id');
        $anio = [1, 2, 3];
        return view('Materia.create', compact('carreras', 'anio'));
    }

    public function store(Request $request)
    {
        // VALIDEZ DE DATOS
        $data = $request->validate([
            'materia' => 'required|max:255',
            'carrera_id' => 'required',
            'anio' => 'required',
            'programa' => 'file|max:2048'
        ]);
        
        // INSTANCIA NOTICIA
       
        $m = new Materia();
        $m->materia = $request->input('materia');
        $m->carrera_id = $request->input('carrera_id');
        $m->anio = $request->input('anio');
        $m->programa = $request->file('programa');
        $m->save();

        $e = New Examen();
        $e->materia_id = $m->id;
        $e->carrera_id = $request->input('carrera_id');
        $e->anio = $request->input('anio');
        $e->save();
       //dd( $m);

        if($request->hasFile('programa')){
            $file = $request->file('programa');
            $path = $file->storeAs('public/programas/' . $m->id, $file->getClientOriginalName()); 
            $savePath = str_replace('public/', '', $path);
            $m->programa = $savePath;
            $m->save();
        }  
        //dd($request->all());
        $request->session()->flash('status', "Se guardo correctamente la materia de $m->materia");
        return redirect()->action([MateriaController::class, 'index']);
    }

    public function show($id)
    {
        $materia = Materia::findOrFail($id);
        return view('Materia.show', compact('materia'));
    }

    public function edit($id)
    {
        $materia = Materia::findOrFail($id);
        $carreras = Carrera::pluck('carrera', 'id');
        $anio = [1, 2, 3];
        return view('Materia.edit', compact('materia', 'carreras',  'anio'));
    }

    public function update(Request $request, $id)
    {
        $m = Materia::findOrFail($id);
        $data = $request->validate([
            'materia' => 'required|max:255',
            'carrera_id' => 'required',
            'anio' => 'required',
            'programa' => 'file|max:2048'
        ]);

        if($request->hasFile('programa')){
            $file = $request->file('programa');
            $path = $file->storeAs('public/programas/' . $m->id, $file->getClientOriginalName()); 
            $savePath = str_replace('public/', '', $path);
            $m->programa = $savePath;
            $m->save();
        }  
        //dd($data);
        $m->materia = $request->input('materia');
        $m->carrera_id = $request->input('carrera_id');
        $m->anio = $request->input('anio');
        $m->save();

        $e = Examen::where('materia_id', $id)->first();
        $e->carrera_id = $request->input('carrera_id');
        $e->anio = $request->input('anio');
        $e->save();
        
        $request->session()->flash('status', "Se actualizó correctamente la materia $m->materia");
        return redirect()->action([MateriaController::class, 'index']);
    }

    public function destroy($id)
    {
        $m = Materia::findOrFail($id);
        $e = Examen::where('materia_id', $id)->first();
        $m->delete();
        $e->delete();
        Session::flash('status', 'Materia eliminada con éxito');
        return redirect()->action([MateriaController::class, 'index']);
    }
}
