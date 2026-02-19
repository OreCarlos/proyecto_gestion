<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function index()
    {
        return response()->json(
            Almacen::where('estado', 'activo')->get()
        );
    }

    public function inactivos()
    {
        $almacenes = Almacen::where('estado', 'inactivo')->get();
        return response()->json($almacenes);
    }




    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'ubicacion' => 'required|max:150',
        ]);

        return response()->json(
            Almacen::create($request->all()),
            201
        );
    }

    public function show($id)
    {
        return response()->json(Almacen::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $almacen = Almacen::findOrFail($id);
        $almacen->update($request->all());

        return response()->json($almacen);
    }

    public function destroy($id)
    {
        Almacen::findOrFail($id)->delete();
        return response()->json(['message' => 'Eliminado']);
    }
}
