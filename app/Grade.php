<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'number', 'formation_id'
    ];

    public function formation()
    {
        return $this->belongsTo('App\Formation');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public static function getGrade($id)
    {
        return Grade::join('formations', 'grades.formation_id', 'formations.id')
            ->join('departments', 'formations.department_id', 'departments.id')
            ->select('grades.id', 'grades.number as grade_number', 'formations.name as formation_name', 'departments.name as department_name')
            ->where('grades.id', $id)
            ->first();
    }

    public static function getGradesOptionList()
    {
        return Grade::join('formations', 'grades.formation_id', 'formations.id')
            ->join('departments', 'formations.department_id', 'departments.id')
            ->select('grades.id', 'grades.number as grade_number', 'formations.name as formation_name', 'departments.name as department_name')
            ->OrderBy('formations.name', 'ASC')
            ->get();
    }

    public static function getGradesShortList($limit = 15)
    {
        return Grade::join('formations', 'grades.formation_id', 'formations.id')
            ->join('departments', 'formations.department_id', 'departments.id')
            ->select('grades.id', 'grades.number as grade_number', 'formations.name as formation_name', 'departments.name as department_name')
            ->OrderBy('formations.name', 'ASC')
            ->orDerBy('grades.number', 'ASC')
            ->withCount('students')
            ->paginate($limit);
    }

    public static function getGradesOptionListToArray()
    {
        $grades = Grade::getGradesOptionList();
        $grades = $grades->mapWithKeys(function ($item) {
            return [$item['id'] => $item['department_name'] . ' - ' . $item['formation_name'] . ' ' . $item['grade_number']];
        })->toArray();
        return $grades;
    }
}
