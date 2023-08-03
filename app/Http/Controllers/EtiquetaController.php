<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 6)
    {
        // $etiquetas = Etiqueta::all();
        $etiquetas = Etiqueta::paginate($page);
        return view('Etiqueta.index')->with('etiquetas', $etiquetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Etiqueta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // VALIDEZ DE DATOS
        $data = $request->validate([
            'nombre' => 'required|max:250',
            'descripcion' => 'required',
        ]);

        $e = new Etiqueta();
        $e->nombre = $request->input('nombre');
        $e->descripcion = $request->input('descripcion');
        $e->save();
        //dd($e);
        Session::flash('status', "Se guardó correctamente la etiqueta $e->nombre");
        return redirect()->action([EtiquetaController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $etiqueta = Etiqueta::findOrFail($id);
       return view('Etiqueta.show', compact('etiqueta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etiqueta = Etiqueta::findOrFail($id);
        return view('Etiqueta.edit', compact('etiqueta'));
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
        $e = Etiqueta::findOrFail($id);
        $data = $request->validate([
            'nombre' => 'required|max:250',
            'descripcion' => 'required',
        ]);
        $e->update($data);
        Session::flash('status', "Se actualizó correctamente la etiqueta $e->nombre");
        return redirect()->action([EtiquetaController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e = Etiqueta::findOrFail($id);
        $e->noticiasEtiqueta()->detach();
        $e->delete();
        Session::flash('status', 'Etiqueta eliminada con éxito');
        return redirect()->action([EtiquetaController::class, 'index']);
    }
}
