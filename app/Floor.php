<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $fillable = [
        'number', 'block_id'
    ];

    public function block()
    {
        return $this->belongsTo('App\Block');
    }

    public function lanes()
    {
        return $this->hasMany('App\Lane');
    }

    public static function getFloor($id)
    {
        return Floor::join('blocks', 'floors.block_id', 'blocks.id')
            ->select('floors.id', 'floors.number as floor_number', 'blocks.name as block_name')
            ->where('floors.id', $id)
            ->first();
    }

    public static function getFloorsOptionList()
    {
        return Block::select('id', 'name')
            ->OrderBy('name', 'ASC')
            ->get();
    }

    public static function getFloorsShortList($limit = 15)
    {
        return Floor::join('blocks', 'floors.block_id', 'blocks.id')
            ->select('floors.id', 'floors.number as floor_number', 'blocks.name as block_name')
            ->OrderBy('blocks.name', 'ASC')
            ->orDerBy('floors.number', 'ASC')
            ->withCount('lanes')
            ->paginate($limit);
    }

}
