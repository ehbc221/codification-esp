<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'name', 'formation_id'
    ];

    public function formation()
    {
        return $this->belongsTo('App\Formation');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }

}
