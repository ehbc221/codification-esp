<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'number', 'room_id'
    ];

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function codifications()
    {
        return $this->hasMany('App\Codification');
    }

    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }

    public static function getPosition($id)
    {
        return Position::join('rooms', 'positions.room_id', 'rooms.id')
            ->join('lanes', 'rooms.lane_id', 'lanes.id')
            ->join('floors', 'rooms.floor_id', 'floors.id')
            ->join('blocks', 'floors.block_id', 'blocks.id')
            ->select('positions.id', 'positions.number as position_number', 'rooms.name as room_name', 'lanes.name as lane_name', 'floors.number as floor_number', 'blocks.name as block_name')
            ->where('positions.id', $id)
            ->first();
    }

    public static function getPositionsOptionList()
    {
        return Position::join('rooms', 'positions.room_id', 'rooms.id')
            ->join('lanes', 'rooms.lane_id', 'lanes.id')
            ->join('floors', 'rooms.floor_id', 'floors.id')
            ->join('blocks', 'floors.block_id', 'blocks.id')
            ->select('positions.id', 'positions.number as position_number', 'rooms.name as room_name', 'lanes.name as lane_name', 'floors.number as floor_number', 'blocks.name as block_name')
            ->OrderBy('blocks.name', 'ASC')
            ->OrderBy('floors.number', 'ASC')
            ->OrderBy('rooms.name', 'ASC')
            ->OrderBy('positions.number', 'ASC')
            ->get();
    }

    public static function getPositionsShortList($limit = 15)
    {
        return Position::join('rooms', 'positions.room_id', 'rooms.id')
            ->join('lanes', 'rooms.lane_id', 'lanes.id')
            ->join('floors', 'rooms.floor_id', 'floors.id')
            ->join('blocks', 'floors.block_id', 'blocks.id')
            ->select('positions.id', 'positions.number as position_number', 'rooms.name as room_name', 'lanes.name as lane_name', 'floors.number as floor_number', 'blocks.name as block_name')
            ->OrderBy('blocks.name', 'ASC')
            ->OrderBy('floors.number', 'ASC')
            ->OrderBy('rooms.name', 'ASC')
            ->orDerBy('positions.number', 'DESC')
            ->withCount('positions')
            ->paginate($limit);
    }

    public static function getPositionsOptionListToArray()
    {
        $positions = Position::getPositionsOptionList();
        $positions = $positions->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name'] = $item['room_name'] . ' (' . $item['block_name'] . ' - ' . $item['floor_number'] . $item['lane_name'] . ')'];
        })->toArray();
        return $positions;
    }

}
