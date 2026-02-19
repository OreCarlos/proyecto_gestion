<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // Aplicar middleware para que solo admins accedan
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Mostrar todos los usuarios
    public function index()
    {
        return view('usuarios.index');
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('usuarios.create');
    }

    // Guardar usuario nuevo
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:admin,supervisor',
            'status' => 'required|in:activo,inactivo',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    // Mostrar formulario de edición
    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    // Actualizar usuario
    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:admin,supervisor',
            'status' => 'required|in:activo,inactivo',
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->role = $request->role;
        $usuario->status = $request->status;

        if ($request->password) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Eliminar usuario
    public function destroy(User $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
