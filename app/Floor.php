<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $fillable = [
        'number', 'block_id'
    ];

    public function block()
    {
        return $this->belongsTo('App\Block');
    }

}
