<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListBuys extends Model
{
    protected $table = 'list-buys';

    public function users() {
        return $this->belongsTo('App\Users', 'user_id', 'id');
    }
}
