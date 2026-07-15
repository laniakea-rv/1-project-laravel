<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Les extends Model
{
    protected $table = 'lessen';

    protected $fillable = [
        'naam',
        'beschrijving',
        'onderwerp',
        'abonnement_type_id',
    ];

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
    public function voortgangen()
    {
        return $this->hasMany(Voortgang::class);
    }

    public function abonnementType()
    {
        return $this->belongsTo(AbonnementType::class);
    }
}
