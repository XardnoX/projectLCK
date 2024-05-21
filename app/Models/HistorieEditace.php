<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorieEditace extends Model
{
    use HasFactory;

    protected $table = 'historie_editace';

    protected $fillable = [
        'stranka_id',
        'popis_editace',
        'datum_editace',
    ];

    public function stranka()
    {
        return $this->belongsTo(Stranka::class, 'stranka_id');
    }
}
