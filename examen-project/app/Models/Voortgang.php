<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voortgang extends Model
{
    protected $table = 'voortgangen';

    protected $fillable = [
        'user_id',
        'les_id',
        'status',
    ];

    public function les()
    {
        return $this->belongsTo(Les::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}