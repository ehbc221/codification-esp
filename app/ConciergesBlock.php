<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConciergesBlock extends Model
{
    protected $fillable = [
        'codification_periode_id', 'concierge_id', 'block_id'
    ];

    public function codification_periode()
    {
        return $this->belongsTo('App\CodificationPeriode');
    }

    public function concierge()
    {
        return $this->belongsTo('App\Concierge');
    }

    public function block()
    {
        return $this->belongsTo('App\Block');
    }

}
