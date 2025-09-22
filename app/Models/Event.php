<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = ['id'];


    public function response()
    {
        return $this->hasMany(EventResponse::class);
    }

    public function schemes()
    {
        return $this->hasMany(Scheme::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
