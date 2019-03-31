<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Article; // подключил модель Article

class Core extends Controller
{
    //
    protected static $articles;

    public static function addArticles($array){
        self::$articles[] = $array;
    }

    public function getArticles()
    {
        //$articles = DB::table('articles')->get();
        //$articles = DB::table('articles')->first();
        //$articles = DB::table('articles')->value('name');
        
        /*$articles = DB::table('articles')->orderBy('id')->chunk(2, function($articles){
            foreach($articles as $article) {
                Core::addArticles($articles);
            }
        });
        dump(self::$articles);*/

        //$articles = DB::table('articles')->pluck('name');
        //$articles = DB::table('articles')->count();
        //$articles = DB::table('articles')->max('id');

        //$articles = DB::table('articles')->distinct()->select('id', 'text')->get();
        //$articles = DB::table('articles')->distinct()->select('id', 'text')->where('id','<', 3)->get();
        //$articles = DB::table('articles')->distinct()->select('id', 'text')->whereBetween('id',[1,5])->get();
        //dump($articles);

        //$articles = Article::all();
        
        /*
        $articles = Article::where('id', '>', 3)->orderBy('name')->take(2)->get();
        foreach($articles as $article){
            echo $article->name.'</br>';
        }
        */
        //$articles = Article::find(1);
        //$articles = Article::findOrFail(100);

/*        
        $articles = new Article;
        $articles->name ='New Article';
        $articles->text ='New Text';
        $articles->save();

        echo $articles->text;
*/
       //добавление информации в БД через модель
/*        Article::create(
            [
                'name'=>'Hello world',
                'text'=>'Some text'
            ]
        );*/
// добавление уникальной инфолрмации в БД если есть, если нет то возвращаем ту запись что нашли
/*        $article = Article::firstOrCreate(
            [
                'name'=>'Hello world',
                'text'=>'Some text'
            ]
        );*/

// добавление уникальной инфолрмации в БД если есть, если нет то возвращаем ту запись 
// что нашли но при этом нужно записть сформированную модель
/*        $article = Article::firstOrNew(
            [
                'name'=>'Hello world',
                'text'=>'Some text'
            ]
        );
        $article->new();*/
// Удаление модели
        //$article = Article::find(11);
        //$article->delete();

        //Article::destroy(10);//  Article::destroy([9,8]) -if you delete a lot of records
        //Article::where('id','3')->delete();
        
/*        $article = Article::find(3);
        $article->delete();
        //используется уже мягкое удаление        */

        //$atricles = Article::onlyTrashed()->restore();
        //$articles = Article::withTrashed()->get();
        
        //$article = Article::find(3);
        //$article->forceDelete();
        
        
        $articles = Article::all();
        dump($articles);
        //dump($article);

        return;

    }

    public function getArticle()
    {
        
    }
}
