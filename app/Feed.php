<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    public function entries()
    {
        return $this->hasMany('App\Entry')->latest();
    }
}
