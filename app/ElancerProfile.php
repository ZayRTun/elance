<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElancerProfile extends Model
{
    protected $guarded = [];

    public function elancer()
    {
        return $this->belongsTo(Elancer::class);
    }
}
