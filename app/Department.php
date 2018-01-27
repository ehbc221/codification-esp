<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name'
    ];

    public function formations()
    {
        return $this->hasMany('App\Formation');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public static function getDepartmentsShortList($limit = 15)
    {
        return Department::select('id', 'name')
            ->OrderBy('created_at', 'DESC')
            ->paginate($limit);
    }

}
