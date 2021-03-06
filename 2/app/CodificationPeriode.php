<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CodificationPeriode extends Model
{
    protected $fillable = [
        'name', 'school_year_start', 'school_year_end', 'start_date', 'end_date'
    ];

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

    public function constraints()
    {
        return $this->hasMany('App\Constraint');
    }

    public static function getCurrentCodificationPeriode()
    {
        return CodificationPeriode::select('id', 'name')
            ->where('start_date', '<', now())
            ->where('end_date', '>', now())
            ->first();
    }

    public static function getCurrentCodificationPeriodeToArray()
    {
        $codification_periode = new Collection([]);
        $codification_periode = CodificationPeriode::getCurrentCodificationPeriode();
        if ($codification_periode) {
            $codification_periode = [$codification_periode->id => $codification_periode->name];
        }
        return $codification_periode;
    }

    public static function isOpened()
    {
        $codification_periode = CodificationPeriode::getCurrentCodificationPeriode();
        return ($codification_periode) ? true : false;
    }

    public static function getCodificationPeriodesOptionList()
    {
        return CodificationPeriode::select('id', 'name')
            ->OrderBy('name', 'ASC')
            ->get();
    }

    public static function getCodificationPeriodesShortList($limit = 15)
    {
        return CodificationPeriode::select('id', 'name', 'start_date', 'end_date')
            ->OrderBy('school_year_end', 'DESC')
            ->withCount('codifications')
            ->paginate($limit);
    }

    public static function getCodificationPeriodesOptionListToArray()
    {
        $codification_periodes = CodificationPeriode::getCodificationPeriodesOptionList();
        $codification_periodes = $codification_periodes->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        })->toArray();
        return $codification_periodes;
    }

}
