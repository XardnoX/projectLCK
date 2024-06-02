<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obrazek extends Model
{
    use HasFactory;

    protected $table = 'obrazek';
    protected $fillable = ['nazev']; // assuming 'obrazek' is the column for storing the image
}