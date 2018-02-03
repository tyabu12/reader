<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    protected $primaryKey = ['user_id', 'feed_id'];

    public $incrementing = false;

    protected $fillable = ['user_id', 'feed_id'];
}
