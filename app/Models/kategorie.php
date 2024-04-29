<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class kategorie extends Model
{
    use HasFactory;
    protected $table = 'kategorie';
    protected $fillable = ['nazev', 'popis','updated_at','deleted_at','created_at']; 
    use SoftDeletes;

}
