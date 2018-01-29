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
            ->where('students.id', $id)
            ->select('users.id as user_id', 'students.id', 'users.name', 'users.email', 'users.phone', 'users.cin', 'users.matriculation', 'students.date_of_birth', 'students.place_of_birth', 'students.sex', 'grades.id as grade_id', 'students.is_foreign', 'students.native_country')
            ->first();
    }

}
