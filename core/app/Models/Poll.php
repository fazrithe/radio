<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $casts = [
        'choice' => 'object'
    ];

    public function pollLogs()
    {
        return $this->hasMany(PollLog::class);
    }
}
