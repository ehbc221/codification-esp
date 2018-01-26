<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name'
    ];

    public function formations()
    {
        return $this->hasMany('App\Formation');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }

}
