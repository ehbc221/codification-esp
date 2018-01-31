<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Codification extends Model
{
    protected $fillable = [
        'codification_periode_id', 'student_id', 'room_id', 'position_id'
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

    public static function getCodification($id)
    {
        return Codification::join('codification_periodes', 'codifications.codification_periode_id', 'codification_periodes.id')
            ->join('students', 'codifications.student_id', 'students.id')
            ->join('positions', 'codifications.codification_periode_id', 'positions.id')
            ->select('codifications.id', 'codification_periodes.name as codification_periode_name', 'students.id as student_id', 'positions.id as position_id')
            ->where('codifications.id', $id)
            ->first();
    }

    public static function getCodificationsShortList($id, $limit = 15)
    {
        return Codification::join('codification_periodes', 'codifications.codification_periode_id', 'codification_periodes.id')
            ->join('positions', 'codifications.position_id', 'positions.id')
            ->select('codifications.id', 'codification_periodes.name as codification_periode_name', 'positions.id as position_id', 'positions.number as position_number')
            ->OrderBy('codification_periodes.end_date', 'DESC')
            ->where('codifications.student_id', $id)
            ->paginate($limit);
    }

    public static function getCodificationsShortListOnly($limit = 15)
    {
        return Codification::join('codification_periodes', 'codifications.codification_periode_id', 'codification_periodes.id')
            ->join('positions', 'codifications.position_id', 'positions.id')
            ->select('codifications.id', 'codification_periodes.name as codification_periode_name', 'positions.id as position_id', 'positions.number as position_number')
            ->OrderBy('codification_periodes.end_date', 'DESC')
            ->paginate($limit);
    }

    public static function isInCurrentCodificationPeriode($id)
    {
        $codification = Codification::findOrFail($id);
        return (CodificationPeriode::isOpened() && ((CodificationPeriode::getCurrentCodificationPeriode())->id === $codification->codification_periode_id));
    }

    public static function studentId($id)
    {
        $codification = Codification::findOrFail($id);
        return ($codification) ? $codification->student_id : null;
    }

}
