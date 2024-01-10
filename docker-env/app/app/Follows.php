<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follows extends Model
{
    protected $table = 'follows';

    public function user() {
        // return $this->belongsTo('App\User', 'id', 'follow_id');
        return $this->belongsToMany('App\User', 'follows', 'user_id', 'follow_id');

    }
}
