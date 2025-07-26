<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; //Para usar Laravel Tokens

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
   //Atribuutos que se pueden llenar
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
    ];
   //Estos datos se ocultan, no se incluyen en Json
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //Hashea
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
   // Modelo declara relaciones con otras tablas. Un usuario tiene una persona.
    public function persona()
    {
        return $this->hasOne(Persona::class, 'usuario_ID', 'id');
    }

    public function eventos()
    {
        return $this->hasMany(Evento::class, 'usuario_ID', 'id');
    }
   // Un usuario puede crear muchos eventos.
    public function compras()
    {
        return $this->hasMany(Compra::class, 'usuario_ID', 'id');
    }
}
