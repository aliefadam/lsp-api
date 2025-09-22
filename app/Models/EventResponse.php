<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventResponse extends Model
{
    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function scheme()
    {
        return $this->belongsTo(Scheme::class);
    }
}
