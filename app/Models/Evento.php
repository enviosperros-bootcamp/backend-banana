<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'usuario_ID',
        'titulo_evento',
        'descripcion_evento',
        'hora_inicio',
        'hora_fin',
        'fecha',
    ];

    // Relación inversa: Un evento pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_ID', 'id');
    }
}
