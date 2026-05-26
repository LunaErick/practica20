<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        if (auth()->user()->rol !== 'admin') {
            return redirect()->route('usuario.perfil');
        }
        $usuarios = User::all();
        return view('admin.index', compact('usuarios'));
    }

    public function create()
    {
        if (auth()->user()->rol !== 'admin') {
            return redirect()->route('usuario.perfil');
        }
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'rol'      => 'required',
        ]);

        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->username . '@practica20.com',
            'password' => Hash::make($request->password),
            'rol'      => $request->rol,
        ]);

        return redirect()->route('admin.index')->with('success', 'Usuario creado correctamente.');
    }

    public function edit($id)
    {
        if (auth()->user()->rol !== 'admin') {
            return redirect()->route('usuario.perfil');
        }
        $usuario = User::findOrFail($id);
        return view('admin.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'name'     => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'rol'      => 'required',
        ]);

        $usuario->name     = $request->name;
        $usuario->username = $request->username;
        $usuario->rol      = $request->rol;

        if ($request->password) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        return redirect()->route('admin.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('admin.index')->with('success', 'Usuario eliminado correctamente.');
    }
}