<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class JobDraft extends Model
{
    protected $guarded = [];

    protected $hidden = [
        'current_page',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
