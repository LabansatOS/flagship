<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function projects()
    {
        return $this->hasMany('App\Reward');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
