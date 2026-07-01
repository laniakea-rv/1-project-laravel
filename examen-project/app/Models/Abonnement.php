<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    //

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function abonnementtype()
    {
        return $this->hasOne(Abonnementtype::class);
    }
}
