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
            ->select('codifications.id', 'codifications.name as codification_name', 'codification_periodes.name as codification_periode_name')
            ->where('codifications.id', $id)
            ->first();
    }

    public static function getCodificationsShortList($limit = 15)
    {
        return Codification::join('codification_periodes', 'codifications.codification_periode_id', 'codification_periodes.id')
            ->select('codifications.id', 'codifications.name as codification_name', 'codification_periodes.name as codification_periode_name')
            ->OrderBy('codification_periodes.name', 'ASC')
            ->orDerBy('codifications.name', 'ASC')
            ->withCount('grades')
            ->paginate($limit);
    }

}
