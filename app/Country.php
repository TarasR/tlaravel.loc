<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable = ['name', 'user_id'];
}
