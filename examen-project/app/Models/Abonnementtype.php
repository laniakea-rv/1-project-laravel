<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abonnementtype extends Model
{
    protected $table = 'abonnementtypes';

    protected $fillable = [
        'naam',
        'beschrijving',
        'prijs',
    ];

    public function abonnementen()
    {
        return $this->hasMany(Abonnement::class);
    }
}
