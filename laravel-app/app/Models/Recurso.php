<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Recurso asociado a un documento (imagen, video o ayuda).
 */
class Recurso extends Model
{
    use HasFactory;

    protected $primaryKey = 'recurso_id';

    protected $fillable = [
        'documento_id',
        'tipo',
        'url',
        'descripcion',
        'orden',
    ];

    public function documento()
    {
        return $this->belongsTo(Documento::class, 'documento_id');
    }
}
