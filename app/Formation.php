<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [
        'name', 'department_id'
    ];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function grades()
    {
        return $this->hasMany('App\Grade');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public static function getFormation($id)
    {
        return Formation::join('departments', 'formations.department_id', 'departments.id')
            ->select('formations.id', 'formations.name as formation_name', 'departments.name as department_name')
            ->where('formations.id', $id)
            ->first();
    }

    public static function getFormationsShortList($limit = 15)
    {
        return Formation::join('departments', 'formations.department_id', 'departments.id')
            ->select('formations.id', 'formations.name as formation_name', 'departments.name as department_name')
            ->OrderBy('departments.name', 'ASC')
            ->orDerBy('formations.name', 'ASC')
            ->withCount('grades')
            ->paginate($limit);
    }

}
