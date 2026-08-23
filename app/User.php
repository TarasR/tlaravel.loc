<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Country;
use App\Article;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
        public function profile() {
            return $this->hasOne(Profile::class);
        }
    */

    public function country()
    {
        return $this->hasOne(Country::class);
        //return $this->hasOne('App\Country');
    }


    public function articles()
    {
        return $this->hasMany(Article::class);
    }


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
}
