<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get a role
     *
     * @param $name
     * @return mixed
     */
    static function getRole($name)
    {
        return Role::where('name', $name)
            ->get()
            ->first();
    }

    /**
     * Get all the roles
     *
     * @return mixed
     */
    static function getAllRoles()
    {
        return Role::select('id', 'name', 'display_name', 'description')
            ->get();
    }

}