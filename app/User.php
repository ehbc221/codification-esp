<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'national_identification_number', 'matriculation'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function student()
    {
        return $this->hasOne('App\Student');
    }

    public function concierges_block()
    {
        return $this->hasOne('App\ConciergesBlock');
    }

    public function codifications()
    {
        return $this->hasMany('App\Codification');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public function getRoleAttribute()
    {
        return $this->getRoleName();
    }

    public function getRoleName()
    {
        return User::join('role_user', 'users.id', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', 'roles.id')
            ->select('roles.name', 'roles.display_name')
            ->where('users.id', Auth::user()->id)
            ->get()
            ->first();
    }

}
