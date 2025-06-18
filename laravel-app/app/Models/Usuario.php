<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

/**
 * Modelo Usuario con sistema de roles básico.
 */
class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'email',
        'password_hash',
        'rol',
    ];

    /**
     * Establece el password haciendo hash automáticamente.
     */
    public function setPasswordHashAttribute($value)
    {
        $this->attributes['password_hash'] = Hash::make($value);
    }
}
