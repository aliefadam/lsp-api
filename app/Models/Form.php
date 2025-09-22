<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $guarded = ['id'];

    public function fields()
    {
        return $this->hasMany(FormField::class);
    }

    public function responses()
    {
        return $this->hasMany(FormResponse::class);
    }
}
