<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = ['id'];

    public function courses()
    {
        return $this->belongsToMany('App\Course')->withPivot(['id', 'status']);
    }

    public function tests()
    {
        return $this->hasMany('App\Test');
    }
}
