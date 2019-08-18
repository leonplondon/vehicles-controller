<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['plate', 'people_id', 'brand_id'];

    public $incrementing = false;

    public function people()
    {
        return $this->belongsTo(Person::class);
    }
}
