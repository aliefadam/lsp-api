<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormResponseValue extends Model
{
    protected $guarded = ['id'];

    public function field()
    {
        return $this->belongsTo(FormField::class);
    }
}
