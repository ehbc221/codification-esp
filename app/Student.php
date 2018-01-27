<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id', 'date_of_birth', 'place_of_birth', 'sex', 'department_id', 'formation_id', 'grade_id', 'is_foreign', 'native_country'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function formation()
    {
        return $this->belongsTo('App\Formation');
    }

    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }

    public function codifications()
    {
        return $this->hasMany('App\Codification');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function exchanges()
    {
        return $this->hasMany('App\Exchange');
    }

}
