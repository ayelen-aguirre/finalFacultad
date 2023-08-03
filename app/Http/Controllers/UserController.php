<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($page = 6)
    {
        $users = User::paginate($page);
        return view('Usuario.index', compact('users'));
    }

    public function create()
    {
        $rol = Rol::pluck('rol', 'id'); // TRAER ROLES
        return view('Usuario.create', compact('rol'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'phone' => 'required|integer',
            'rol_id' => 'required',
            'password' => 'required|max:255|min:4|confirmed',
            'password_confirmation' => 'required|max:255|min:4'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->rol_id = $request->input('rol_id');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        $request->session()->flash('status', "Se creo correctamente el usuario $user->name");
        return redirect()->action([UserController::class, 'index']);
    }

    public function show($id)
    {
       $user = User::findOrFail($id);
       return view('Usuario.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $rol = Rol::pluck('rol', 'id');
        return view('Usuario.edit', compact('user', 'rol'));
    }

    public function update(Request $request, $id)
    {
        $u = User::findOrFail($id);
        $data = $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($u->id)], 
            'phone' => 'required|integer',
            'rol_id' => 'required',
            'password' => 'required|max:255|min:4|confirmed',
            'password_confirmation' => 'required|max:255|min:4'
        ]);    
        $u->name = $request->input('name');
        $u->email = $request->input('email');
        $u->phone = $request->input('phone');
        $u->rol_id = $request->input('rol_id');
        $u->password = Hash::make($request->input('password'));
        $u->save();
        $request->session()->flash('status', "Se actualizó correctamente el usuario $u->name");
        return redirect()->action([UserController::class, 'index']);
    }

    public function destroy($id)
    {
        $u = User::findOrFail($id);
        $u->delete();
        Session::flash('status', 'Usuario eliminado con éxito');
        return redirect()->action([UserController::class, 'index']);
    }
}
