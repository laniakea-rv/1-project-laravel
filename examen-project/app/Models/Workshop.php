<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'workshop_id', 'user_id');
    }
}
