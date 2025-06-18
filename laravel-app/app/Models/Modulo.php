<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Modulo que pertenece a un proyecto.
 */
class Modulo extends Model
{
    use HasFactory;

    protected $primaryKey = 'modulo_id';

    protected $fillable = [
        'proyecto_id',
        'nombre',
        'descripcion',
        'orden',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }

    public function submodulos()
    {
        return $this->hasMany(Submodulo::class, 'modulo_id');
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'modulo_id');
    }
}
