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
        'name', 'email', 'password', 'phone', 'cin', 'matriculation'
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

    public static function getUser($id)
    {
        return User::join('role_user', 'users.id', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', 'roles.id')
            ->select('users.id', 'users.name', 'users.email', 'users.phone', 'users.cin', 'users.matriculation', 'roles.display_name as role_display_name')
            ->first();
    }

    public static function getList(array $select = null, array $where = null, string $orderBy = null, string $orderType = null, int $limit = 15)
    {
        $fields = ['id', 'name', 'email', 'phone', 'cin', 'matriculation', 'confirmation_code', 'confirmed'];
        return User::join('role_user', 'users.id', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', 'roles.id')
            ->when($select, function ($query) use($select, $fields) {
                $select = array_unique($select);
                foreach ($select as $item) {
                    if (!in_array($item, $fields)) {
                        return $query;
                    }
                }
                if (count($select) === 1 && $select[0] === 'list') {
                    return $query->select($fields);
                }
                return $query->select($select);
            })
            ->when($where, function ($query) use($where, $fields) {
                foreach ($where as $key => $value) {
                    if (!in_array($key, $fields)) {
                        return $query;
                    }
                }
                foreach ($where as $key => $value) {
                    $query = $query->where($key, $value);
                }
            })
            ->when([$orderBy, $orderType], function ($query) use($orderBy, $orderType) {
                $orderType = (in_array(strtoupper($orderType), ['ASC', 'DESC'])) ? strtoupper($orderType) : 'DESC';
                $orderBy = (in_array($orderBy, ['name', 'email', 'cin', 'matriculation', 'confirmed'])) ? $orderBy : 'updated_at';
                return $query->orderBy($orderBy, $orderType);
            }, function ($query) {
                return $query->orderBy('updated_at', 'DESC');
            })
            ->paginate($limit);
    }

    public static function getUsersShortList($limit = 15)
    {
        return User::join('role_user', 'users.id', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', 'roles.id')
            ->select('users.id as user_id', 'users.name as user_name', 'users.email as user_email', 'users.confirmed as user_confirmed', 'roles.display_name as role_display_name')
            ->OrderBy('users.created_at', 'DESC')
            ->paginate($limit);
    }

}
