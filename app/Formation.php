<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [
        'name', 'department_id'
    ];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function grades()
    {
        return $this->hasMany('App\Grade');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }

}
