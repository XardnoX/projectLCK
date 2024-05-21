<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskuse extends Model
{
    use HasFactory;

    protected $table = 'diskuse';

    protected $fillable = [
        'obsah',
        'datum',
        'stranka_id',
        'uzivatel_id',
    ];

    public function stranka()
    {
        return $this->belongsTo(Stranka::class, 'stranka_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'uzivatel_id');
    }
}
