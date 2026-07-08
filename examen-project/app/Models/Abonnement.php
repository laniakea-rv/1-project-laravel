<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    //
    protected $fillable = [
        'user_id',
        'abonnementtype_id',
        'start_datum',
        'eind_datum',
        'active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function abonnementtype()
    {
        return $this->hasOne(Abonnementtype::class);
    }
}
