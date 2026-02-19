<?php

namespace App\Http\Controllers;

use App\Models\Almacen;

class DashboardController extends Controller
{
    public function index()
    {
        $almacenes = Almacen::all();
        return view('dashboard', compact('almacenes'));
    }
}
