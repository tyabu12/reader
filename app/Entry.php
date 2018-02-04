<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    public function feed()
    {
        return $this->belongsTo('App\Feed');
    }
}
