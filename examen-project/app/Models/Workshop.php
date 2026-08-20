<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $fillable = [
        'naam',
        'beschrijving',
        'locatie',
        'tijd',
        'afbeelding',
    ];
    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'workshop_user',
            'workshop_id',
            'user_id'
        );
    }
}
