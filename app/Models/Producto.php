<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'stock',
        'precio',
        'almacen_id',
        'estado'
    ];

    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }
}
