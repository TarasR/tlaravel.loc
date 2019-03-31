<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    //
    use SoftDeletes;

    protected $table = 'articles';
    protected $fillable = ['name','text']; // разрешает добавлять в эти поля иначе нельзя добавлять с модели
    protected $guarded = ['*']; // запрешает добавлять в эти поля в модели
    protected $dates = ['deleted_at'];
}
