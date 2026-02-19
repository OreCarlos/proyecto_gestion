<?php

namespace App\Http\Controllers;

use App\Models\Almacen;
use Illuminate\Http\Request;

class AlamacenController extends Controller
{
    public function index()
    {
        $almacenes = Almacen::all(); 
        return view('almacenes.index', compact('almacenes'));
    }

    public function create()
    {
        return view('almacenes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'ubicacion' => 'required|string|max:150',
            'descripcion' => 'nullable|string',
            'estado' => 'required|in:activo,inactivo',
        ]);

        Almacen::create($request->all());

        return redirect()->route('almacenes.index')->with('success', 'Almacén creado correctamente.');
    }

    public function edit(Almacen $almacen)
    {
        return view('almacenes.edit', compact('almacen'));
    }

    public function update(Request $request, Almacen $almacen)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'ubicacion' => 'required|string|max:150',
            'descripcion' => 'nullable|string',
            'estado' => 'required|in:activo,inactivo',
        ]);

        $almacen->update($request->all());

        return redirect()->route('almacenes.index')->with('success', 'Almacén actualizado correctamente.');
    }

    public function destroy(Almacen $almacen)
    {
        $almacen->delete();
        return redirect()->route('almacenes.index')->with('success', 'Almacén eliminado correctamente.');
    }
}
