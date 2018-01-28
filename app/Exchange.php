<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    protected $fillable = [
        'codification_periode_id', 'student_id_out', 'student_id_in', 'room_id_student_out', 'room_id_student_in', 'constraint_to', 'constraint_to_id'
    ];

    public function codification_periode()
    {
        return $this->belongsTo('App\CodificationPeriode');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

}
