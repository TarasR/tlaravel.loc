<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Article extends Model
{
    //
    use SoftDeletes;

    protected $table = 'articles';
    protected $fillable = ['name','text']; // разрешает добавлять в эти поля иначе нельзя добавлять с модели
    protected $guarded = ['*']; // запрешает добавлять в эти поля в модели
    protected $dates = ['deleted_at'];

    protected $casts = ['name' => 'string']; // Указания явного типа поля

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getNameAttribute($value) {
        return 'Head '.$value;
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = ' | '.$value;
    }
}
