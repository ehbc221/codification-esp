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

    public static function getDepartmentsOptionList()
    {
        return Department::select('id', 'name')
            ->OrderBy('name', 'ASC')
            ->get();
    }

    public static function getDepartmentsShortList($limit = 15)
    {
        return Department::select('id', 'name')
            ->OrderBy('created_at', 'DESC')
            ->withCount('formations')
            ->paginate($limit);
    }

    public static function getDepartmentsOptionListToArray()
    {
        $departments = Department::getDepartmentsOptionList();
        $departments = $departments->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        })->toArray();
        return $departments;
    }

}
