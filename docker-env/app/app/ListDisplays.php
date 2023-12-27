<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListDisplays extends Model
{

    protected $table = 'list-display';

    public function display() {
        return $this->belongsToMany('App\User', 'user_id', 'id');
    }
}
