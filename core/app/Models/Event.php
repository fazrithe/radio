<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];


    public function jockey()
    {
        return $this->belongsTo(RadioJockey::class, 'radio_jockey_id');
    }


    public function scopeFilter($query, $filters)
    {
        
        if ($month = @$filters['month']) {
            $month_num = Carbon::parse($month)->month;
            $query->whereMonth('event_date', $month_num);
        }


        if ($year = @$filters['year']) {
            $query->whereYear('event_date', $year);
        }

    }

}
