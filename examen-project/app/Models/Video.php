<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'les_id',
        'naam',
        'bestand',
    ];

    public function les()
    {
        return $this->belongsTo(Les::class);
    }
}