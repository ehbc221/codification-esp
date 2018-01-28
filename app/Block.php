<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = [
        'name'
    ];

    public function floors()
    {
        return $this->hasMany('App\Floor');
    }

    public function concierges_block()
    {
        return $this->hasMany('App\ConciergeBlock');
    }

    public static function getBlocksOptionList()
    {
        return Block::select('id', 'name')
            ->OrderBy('name', 'ASC')
            ->get();
    }

    public static function getBlocksShortList($limit = 15)
    {
        return Block::select('id', 'name')
            ->OrderBy('created_at', 'DESC')
            ->withCount('floors')
            ->paginate($limit);
    }

}
