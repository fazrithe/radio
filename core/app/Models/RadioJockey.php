<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RadioJockey extends Model
{
    protected $guarded =['id'];

    public function socials()
    {
        return $this->hasMany(Social::class);
    }
    
    protected $casts = [
        'education' => 'object',
        'experience' => 'object',
        'gallary' => 'object'
    ];

    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }
}
