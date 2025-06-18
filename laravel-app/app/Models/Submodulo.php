<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Submodulo que pertenece a un módulo.
 */
class Submodulo extends Model
{
    use HasFactory;

    protected $primaryKey = 'submodulo_id';

    protected $fillable = [
        'modulo_id',
        'nombre',
        'descripcion',
        'orden',
    ];

    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'modulo_id');
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'submodulo_id');
    }
}
