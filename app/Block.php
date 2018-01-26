<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = [
        'name'
    ];

    public function floors()
    {
        return $this->hasMany('App\Floor');
    }

    public function concierges_block()
    {
        return $this->hasMany('App\ConciergeBlock');
    }

}
