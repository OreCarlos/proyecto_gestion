<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Almacen extends Model
{

    use HasFactory, SoftDeletes;

    protected $table = 'almacenes';

    protected $fillable = ['nombre', 'ubicacion', 'descripcion', 'estado'];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
