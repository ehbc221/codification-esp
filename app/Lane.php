<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lane extends Model
{
    protected $fillable = [
        'name', 'floor_id'
    ];

    public function floor()
    {
        return $this->belongsTo('App\Floor');
    }

}
