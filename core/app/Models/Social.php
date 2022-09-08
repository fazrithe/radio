<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $guarded = [];

    public function jockey()
    {
        return $this->belongsTo(RadioJockey::class , 'radio_jockey_id');
    }
}
