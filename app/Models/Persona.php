<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    // Campos que puedes llenar masivamente (según migración)
    protected $fillable = [
        'usuario_ID',
        'nombre_persona',
        'apellido_persona',
        'direccion',
        'telefono',
        'imagenPerfil_url',
    ];

    // Relación inversa: cada persona pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_ID', 'id');
    }
}
