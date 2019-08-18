<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['id', 'name'];

    public $incrementing = false;

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class, 'people_id');
    }
}
