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

    public static function getBlocksOptionList()
    {
        return Block::select('id', 'name')
            ->OrderBy('name', 'ASC')
            ->get();
    }

    public static function getBlocksShortList($limit = 15)
    {
        return Block::select('id', 'name')
            ->OrderBy('name', 'ASC')
            ->withCount('floors')
            ->paginate($limit);
    }

    public static function getBlocksOptionListToArray()
    {
        $blocks = Block::getBlocksOptionList();
        $blocks = $blocks->mapWithKeys(function ($item) {
            return [$item['id'] => $item['name']];
        })->toArray();
        return $blocks;
    }

}
