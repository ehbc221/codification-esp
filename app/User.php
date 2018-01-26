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

    public function getList(array $select = null, array $where = null, string $sortBy = null, string $sortType = 'ASC', int $limit = 15)
    {
        $fields = ['id', 'name', 'email', 'phone', 'national_identification_number', 'matriculation', 'confirmation_code', 'confirmed'];
        return User::join('role_user', 'users.id', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', 'roles.id')
            ->when($select, function ($query) use($select, $fields) {
                $select = array_unique($select);
                foreach ($select as $item) {
                    if (!in_array($item, $fields)) {
                        return $query;
                    }
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
            ->when($sortBy, function ($query) use($sortBy, $sortType) {
                $sortType = (in_array(strtoupper($sortType), ['ASC', 'DESC'])) ? strtoupper($sortType) : 'DESC';
                $sortBy = (in_array($sortBy, ['name', 'email', 'national_identification_number', 'matriculation', 'confirmed'])) ? $sortBy : 'updated_at';
                return $query->sortBy($sortBy, $sortType);
            })
            ->paginate($limit);
    }

}
