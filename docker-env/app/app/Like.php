<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function like_exist($user_id, $display_id) {
        return Like::where('user_id', $user_id)->where('display_id', $display_id)->exists();
    }

}
