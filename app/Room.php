<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'number', 'lane_id'
    ];

    public function lane()
    {
        return $this->belongsTo('App\Lane');
    }

    public function positions()
    {
        return $this->hasMany('App\Position');
    }

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

    public static function getRoom($id)
    {
        return Room::join('lanes', 'rooms.lane_id', 'lanes.id')
            ->join('floors', 'lanes.floor_id', 'floors.id')
            ->join('blocks', 'floors.block_id', 'blocks.id')
            ->select('rooms.id', 'rooms.number as room_number', 'lanes.name as lane_name', 'floors.number as floor_number', 'blocks.name as block_name')
            ->where('rooms.id', $id)
            ->first();
    }

    public static function getRoomsOptionList()
    {
        return Room::join('lanes', 'rooms.lane_id', 'lanes.id')
            ->join('floors', 'lanes.floor_id', 'floors.id')
            ->join('blocks', 'floors.block_id', 'blocks.id')
            ->select('rooms.id', 'rooms.number as room_number', 'lanes.name as lane_name', 'floors.number as floor_number', 'blocks.name as block_name')
            ->OrderBy('blocks.name', 'ASC')
            ->OrderBy('floors.number', 'ASC')
            ->OrderBy('lanes.name', 'ASC')
            ->OrderBy('rooms.number', 'ASC')
            ->get();
    }

    public static function getRoomsShortList($limit = 15)
    {
        return Room::join('lanes', 'rooms.lane_id', 'lanes.id')
            ->join('floors', 'lanes.floor_id', 'floors.id')
            ->join('blocks', 'floors.block_id', 'blocks.id')
            ->select('rooms.id', 'rooms.number as room_number', 'lanes.name as lane_name', 'floors.number as floor_number', 'blocks.name as block_name')
            ->OrderBy('blocks.name', 'ASC')
            ->OrderBy('floors.number', 'ASC')
            ->OrderBy('lanes.name', 'ASC')
            ->orDerBy('rooms.number', 'DESC')
            ->withCount('positions')
            ->paginate($limit);
    }

    public static function getRoomsOptionListToArray()
    {
        $rooms = Room::getRoomsOptionList();
        $rooms = $rooms->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name'] = $item['lane_name'] . ' (' . $item['floor_number'] . ' - ' . $item['block_name'] . ')'];
        })->toArray();
        return $rooms;
    }

}
