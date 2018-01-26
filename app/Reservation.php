<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'codification_periode_id', 'student_id', 'room_id', 'position_id', 'is_validated'
    ];

    public function codification_periode()
    {
        return $this->belongsTo('App\CodificationPeriode');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function position()
    {
        return $this->belongsTo('App\Position');
    }

}
