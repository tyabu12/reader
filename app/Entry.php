<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $dates = [
        'published_at',
    ];

    public function feed()
    {
        return $this->belongsTo('App\Feed');
    }
}
