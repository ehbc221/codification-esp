<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Student extends Model
{
    protected $fillable = [
        'user_id', 'date_of_birth', 'place_of_birth', 'sex', 'department_id', 'formation_id', 'grade_id', 'is_foreign', 'native_country'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
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

    public static function getStudentProfile($id)
    {
        return Student::join('users', 'students.user_id', 'users.id')
            ->join('grades', 'students.grade_id', 'grades.id')
            ->where('users.id', $id)
            ->select('users.id as user_id', 'students.id', 'users.name', 'users.email', 'users.phone', 'users.cin', 'users.matriculation', 'students.date_of_birth', 'students.place_of_birth', 'students.sex', 'grades.id as grade_id', 'students.is_foreign', 'students.native_country')
            ->first();
    }

    public static function getStudent($id)
    {
        return Student::join('users', 'students.user_id', 'users.id')
            ->select('students.id', 'users.name')
            ->where('students.id', $id)
            ->first();
    }

    public static function getStudentToArray($id)
    {
        $student = Student::getStudent($id);
        $student = [$student->id => $student->name];
        return $student;
    }

    public static function isOwner($id)
    {
        return (Auth::user()->id === Reservation::studentId($id));
    }

    public static function hasCurrentReservation($id)
    {
        if (!CodificationPeriode::isOpened()) {
            return false;
        }
        $codification_periode = CodificationPeriode::getCurrentCodificationPeriode();
        $reservation = Reservation::select('id')
            ->where('reservations.codification_periode_id', $codification_periode->id)
            ->where('reservations.student_id', $id)
            ->first();
        return ($reservation) ? true : false;
    }

}
