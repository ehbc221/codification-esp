<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Constraint extends Model
{
    protected $fillable = [
        'codification_periode_id', 'comment', 'constraint_from', 'constraint_from_id', 'constraint_to', 'constraint_to_id'
    ];

    public function codification_periode()
    {
        return $this->belongsTo('App\CodificationPeriode');
    }

}
