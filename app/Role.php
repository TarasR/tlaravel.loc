<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Role extends Model
{
    //
    public function users() {
        $this->belongsToMany(User::class,'role_user','role_id','user_id');
    }
}
