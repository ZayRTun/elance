<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    protected $fillable = ['category'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function skills()
    {
        return $this->hasMany(SubServiceSkill::class);
    }
}
