<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodificationPeriode extends Model
{
    protected $fillable = [
        'name', 'school_year_start', 'school_year_end', 'start_date', 'end_date'
    ];

    public function concierges_blocks()
    {
        return $this->hasMany('App\ConciergeBlock');
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

    public function constraints()
    {
        return $this->hasMany('App\Constraint');
    }

}
