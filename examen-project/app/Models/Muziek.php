<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Muziek extends Model
{
    protected $table = 'muziek';

    protected $fillable = [
        'naam',
        'beschrijving',
        'bestand',
        'prijs',
        'afbeelding',
    ];
}
