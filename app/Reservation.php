<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'codification_periode_id', 'student_id', 'position_id', 'validation_code', 'is_validated'
    ];

    public function codification_periode()
    {
        return $this->belongsTo('App\CodificationPeriode');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function position()
    {
        return $this->belongsTo('App\Position');
    }

    public static function getReservation($id)
    {
        return Reservation::join('codification_periodes', 'formations.codification_periode_id', 'codification_periodes.id')
            ->join('positions', 'reservations.codification_periode_id', 'positions.id')
            ->select('reservations.id', 'codification_periodes.name as codification_periode_name', 'positions.id as position_id')
            ->where('reservations.id', $id)
            ->first();
    }

    public static function getReservationsShortList($id, $limit = 15)
    {
        return Reservation::join('codification_periodes', 'reservations.codification_periode_id', 'codification_periodes.id')
            ->join('positions', 'reservations.position_id', 'positions.id')
            ->select('reservations.id', 'codification_periodes.name as codification_periode_name', 'positions.id as position_id', 'positions.number as position_number')
            ->OrderBy('codification_periodes.end_date', 'ASC')
            ->where('reservations.student_id', $id)
            ->paginate($limit);
    }

}
