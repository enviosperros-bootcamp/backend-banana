<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'usuario_ID',
        'fecha',
        'tipo_pago',
        'total',
    ];

    // Relación inversa: Una compra pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_ID', 'id');
    }
}
