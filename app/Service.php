<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title'
    ];

    public function subServices()
    {
        return $this->hasMany(SubService::class);
    }

    public function subServiceSkills()
    {
        return $this->hasManyThrough(SubServiceSkill::class, SubService::class);
    }
}
