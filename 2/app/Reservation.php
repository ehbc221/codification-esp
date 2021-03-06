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
        return Reservation::join('codification_periodes', 'reservations.codification_periode_id', 'codification_periodes.id')
            ->join('students', 'reservations.student_id', 'students.id')
            ->join('positions', 'reservations.codification_periode_id', 'positions.id')
            ->select('reservations.id', 'reservations.is_validated', 'codification_periodes.name as codification_periode_name', 'students.id as student_id', 'positions.id as position_id')
            ->where('reservations.id', $id)
            ->first();
    }

    public static function getReservationsShortList($id, $limit = 15)
    {
        return Reservation::join('codification_periodes', 'reservations.codification_periode_id', 'codification_periodes.id')
            ->join('positions', 'reservations.position_id', 'positions.id')
            ->select('reservations.id', 'codification_periodes.name as codification_periode_name', 'positions.id as position_id', 'positions.number as position_number')
            ->OrderBy('codification_periodes.end_date', 'DESC')
            ->where('reservations.student_id', $id)
            ->paginate($limit);
    }

    public static function getReservationsShortListOnly($limit = 15)
    {
        return Reservation::join('codification_periodes', 'reservations.codification_periode_id', 'codification_periodes.id')
            ->join('positions', 'reservations.position_id', 'positions.id')
            ->select('reservations.id', 'reservations.is_validated', 'codification_periodes.name as codification_periode_name', 'positions.id as position_id', 'positions.number as position_number')
            ->OrderBy('codification_periodes.end_date', 'DESC')
            ->paginate($limit);
    }

    public static function isInCurrentCodificationPeriode($id)
    {
        $reservation = Reservation::findOrFail($id);
        return (CodificationPeriode::isOpened() && ((CodificationPeriode::getCurrentCodificationPeriode())->id === $reservation->codification_periode_id));
    }

    public static function studentId($id)
    {
        $reservation = Reservation::findOrFail($id);
        return ($reservation) ? $reservation->student_id : null;
    }

}
