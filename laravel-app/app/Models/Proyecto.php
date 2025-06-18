<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Proyecto para representar la tabla proyectos.
 */
class Proyecto extends Model
{
    use HasFactory;

    protected $primaryKey = 'proyecto_id';

    protected $fillable = [
        'nombre',
        'descripcion',
        'slug',
    ];

    public function modulos()
    {
        return $this->hasMany(Modulo::class, 'proyecto_id');
    }

    public function configuracion()
    {
        return $this->hasOne(Configuracion::class, 'proyecto_id');
    }
}
