<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Almacen;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        $productos = Producto::with('almacen')->get(); // Relación con almacen
        return view('productos.index', compact('productos'));
    }

    // Crear producto
    public function create()
    {
        // Solo almacenes activos
        $almacenes = Almacen::where('estado', 'activo')->get();
        return view('productos.create', compact('almacenes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:150',
            'descripcion' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'almacen_id' => 'required|exists:almacenes,id',
            'estado' => 'required|in:activo,inactivo',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente');
    }

    // Editar producto
    public function edit(Producto $producto)
    {
        $almacenes = Almacen::where('estado', 'activo')->get();
        return view('productos.edit', compact('producto', 'almacenes'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:150',
            'descripcion' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'almacen_id' => 'required|exists:almacenes,id',
            'estado' => 'required|in:activo,inactivo',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
    }
}
