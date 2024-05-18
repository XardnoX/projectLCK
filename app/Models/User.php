<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'uzivatel';
    protected $fillable = [
        'krestni_jmeno',
        'prijmeni',
        'prezdivka',
        'heslo',
        'datum_registrace',
    ];

   

    protected $hidden = [
        'heslo',
    ];

    protected $casts = [
        'datum_registrace' => 'datetime',
        'heslo' => 'hashed',
    ];
}
