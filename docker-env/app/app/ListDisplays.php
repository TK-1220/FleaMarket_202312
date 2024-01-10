<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListDisplays extends Model
{

    protected $table = 'list-display';

    public function display() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function likes() {
        return $this->belongsTo('App\Like', 'id', 'display_id');
    }

    public function follows() {
        return $this->belongsTo('App\Follows', 'user_id', 'user_id');
    }

    public function history() {
        return $this->belogsTo('App\ListBuys', 'id', 'list_id');
    }
}
