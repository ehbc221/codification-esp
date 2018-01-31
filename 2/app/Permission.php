<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
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
     * Get a permission
     *
     * @param $name
     * @return mixed
     */
    static function getPermission($name)
    {
        return Permission::where('name', $name)
            ->get()
            ->first();
    }

    /**
     * Get all the permissions
     *
     * @return mixed
     */
    static function getAllPermissions()
    {
        return Permission::select('id', 'name', 'display_name', 'description')
            ->get();
    }

}