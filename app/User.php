<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Country;
use App\Article;
use App\Role;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'login', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

// мой код начало 
    /*
        public function profile() {
            return $this->hasOne(Profile::class);
        }
    */   

    public function country() {
        return $this->hasOne(Country::class);    
        //return $this->hasOne('App\Country');    
    }


    public function articles(){
        return $this->hasMany(Article::class);
    }


    public function roles() {
        return $this->belongsToMany('App\Role');
    }
// мой код конец

}
