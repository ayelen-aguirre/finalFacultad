<?php

namespace App\Http\Controllers;
use App\Models\Materia;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $materias = Materia::paginate(6);
        return view('Materia.index', compact('materias'));
    }
}