<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stranka extends Model
{
    use HasFactory;

    protected $table = 'stranka';

    protected $fillable = [
        'nazev',
        'obrazek_id',
        'datum_vytvoreni',
        'verze',
    ];

    public function diskuse()
    {
        return $this->hasMany(Diskuse::class, 'stranka_id');
    }

    public function historieEditace()
    {
        return $this->hasMany(HistorieEditace::class, 'stranka_id');
    }

    public function kategorie()
    {
        return $this->belongsToMany(Kategorie::class, 'stranka_has_kategorie', 'stranka_id', 'kategorie_id');
    }
}
