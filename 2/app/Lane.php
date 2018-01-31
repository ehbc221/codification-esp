<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lane extends Model
{
    protected $fillable = [
        'name', 'floor_id'
    ];

    public function floor()
    {
        return $this->belongsTo('App\Floor');
    }

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    public static function getLane($id)
    {
        return Lane::join('floors', 'lanes.floor_id', 'floors.id')
            ->join('blocks', 'floors.block_id', 'blocks.id')
            ->select('lanes.id', 'lanes.name as lane_name', 'floors.number as floor_number', 'blocks.name as block_name')
            ->where('lanes.id', $id)
            ->first();
    }

    public static function getLanesOptionList()
    {
        return Lane::join('floors', 'lanes.floor_id', 'floors.id')
            ->join('blocks', 'floors.block_id', 'blocks.id')
            ->select('lanes.id', 'lanes.name as lane_name', 'floors.number as floor_number', 'blocks.name as block_name')
            ->OrderBy('blocks.name', 'ASC')
            ->OrderBy('floors.number', 'ASC')
            ->OrderBy('lanes.name', 'DESC')
            ->get();
    }

    public static function getLanesShortList($limit = 15)
    {
        return Lane::join('floors', 'lanes.floor_id', 'floors.id')
            ->join('blocks', 'floors.block_id', 'blocks.id')
            ->select('lanes.id', 'lanes.name as lane_name', 'floors.number as floor_number', 'blocks.name as block_name')
            ->OrderBy('blocks.name', 'ASC')
            ->OrderBy('floors.number', 'ASC')
            ->orDerBy('lanes.name', 'DESC')
            ->withCount('rooms')
            ->paginate($limit);
    }

    public static function getLanesOptionListToArray()
    {
        $lanes = Lane::getLanesOptionList();
        $lanes = $lanes->mapWithKeys(function ($item) {
            return [$item['id'] => $item['lane_name'] = $item['block_name'] . ' - Étage ' . $item['floor_number'] . ' - Couloir ' . $item['lane_name']];
        })->toArray();
        return $lanes;
    }

}
