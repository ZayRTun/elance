<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubServiceSkill extends Model
{
    protected $fillable = ['skills'];

    public function subService()
    {
        return $this->belongsTo(subService::class);
    }
}
