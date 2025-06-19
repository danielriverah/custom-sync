<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Configuracion para las opciones visuales de un proyecto.
 */
class Configuracion extends Model
{
    use HasFactory;
    protected $table='configuraciones';
    protected $primaryKey = 'configuracion_id';

    protected $fillable = [
        'proyecto_id',
        'logo_url',
        'color_primario',
        'color_secundario',
        'fuente',
        'layout',
        'modo_dark',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }
}
