<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Documento para almacenar textos e información.
 */
class Documento extends Model
{
    use HasFactory;

    protected $primaryKey = 'documento_id';

    protected $fillable = [
        'submodulo_id',
        'modulo_id',
        'titulo',
        'contenido',
        'orden',
    ];

    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'modulo_id');
    }

    public function submodulo()
    {
        return $this->belongsTo(Submodulo::class, 'submodulo_id');
    }

    public function recursos()
    {
        return $this->hasMany(Recurso::class, 'documento_id');
    }
}
