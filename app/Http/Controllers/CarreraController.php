<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CarreraController extends Controller
{
    public function index($page = 6)
    {
        $carreras = Carrera::paginate($page);
        return view('Carrera.index')->with('carreras', $carreras);
    }

    public function create()
    {
        return view('Carrera.create');
    }

    public function store(Request $request)
    {
       
        // VALIDEZ DE DATOS
        $data = $request->validate([
            'carrera' => 'required|unique:carreras|max:250', //agregueee unique:carreraS
            'resolucion' => 'required|max:250',
            'pdf' => 'file|max:2048'
        ]);
        dd($data);
        $c = new Carrera();
        $c->carrera = $request->input('carrera');
        $c->resolucion = $request->input('resolucion');
        $c->pdf = $request->file('pdf');
        $c->save();


        if($request->hasFile('pdf')){
            $filePDF = $request->file('pdf');
            $path = $filePDF->storeAs('public/carrera/' . $c->id, $filePDF->getClientOriginalName()); 
            $savePath = str_replace('public/', '', $path);
            $c->pdf = $savePath;
            $c->save();
        }
        //dd($c);
        Session::flash('status', "Se guardó correctamente la carrera de $c->carrera");
        return redirect()->action([CarreraController::class, 'index']);
    }

    public function show($id)
    {
        $carrera = Carrera::findOrFail($id);
       return view('Carrera.show', compact('carrera'));
    }

    public function edit($id)
    {
        $carrera = Carrera::findOrFail($id);
        return view('Carrera.edit', compact('carrera'));
    }

    public function update(Request $request, $id)
    {
        $c = Carrera::findOrFail($id);
        $data = $request->validate([
            'carrera' => 'required|unique:carreras|max:250', //aca agregue |unique:carreras|
            'resolucion' => 'required|max:250',
            'pdf' => 'file|mimes:pdf'
        ]);

        if($request->hasFile('pdf')){
            $filePDF = $request->file('pdf');
            $path = $filePDF->storeAs('public/carrera/' . $c->id, $filePDF->getClientOriginalName()); 
            $savePath = str_replace('public/', '', $path);
            $c->pdf = $savePath;
            $c->save();
        }
        //dd($data);
        $c->carrera = $request->input('carrera');
        $c->resolucion = $request->input('resolucion');
        $c->save();
        Session::flash('status', "Se actualizó correctamente la carrera $c->carrera");
        return redirect()->action([CarreraController::class, 'index']);
    }

    public function destroy($id)
    {
        $c = Carrera::findOrFail($id);
        $c->delete();
        
        Session::flash('status', 'Carrera eliminada con éxito');
        return redirect()->action([CarreraController::class, 'index']);
    }
}
