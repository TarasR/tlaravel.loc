<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Article; // подключил модель Article
use App\User;
use App\Role;

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
        //$articles = Article::all();
        //dump($articles);
        //dump($article);
        

        //$user = User::find(1);
        //dump($user->country);

        //$user = User::find(1);

        //$articles = $user->articles()->where('id','>',3)->get();
        //$articles = $user->articles;

        //dump($articles);
//        foreach($articles as $article) {
//             echo $article->name.'<br>';
//        }
        //$user = User::find(1);
/*
        foreach($user->roles as $role) {
            echo $role->name.'<br>';
        }
*/        

        //$role = Role::find(1);

        //dump($role->users);



        //$articles = Article::all();
//         $users = User::has('articles')->get(); // Выбирает толко связанные данные из таблицы 
 
        //$users = User::with('roles','articles')->get();

        //$articles->load('user');
        
/*        foreach($users as $user) {
            dump($user->roles);
            //echo $article->user->name.'<br>';
        }*/
//        dump($articles);

/**Фвв штащкьфешщт */
        $user = User::find(2);
        
        
        /*$article = new Article([
            'name' => 'New article2233',
            'text' =>  'Same text for new article'
        ]);
        */
        
        // $user->articles()->save($article); Принимает модель 
        
        /*   Херачим в массивом данные
        $user->articles()->create([
            'name' => 'New article2233',
            'text' =>  'Same text for new article'
        ]);
        */
        // Принимает модель массивов
        /* $user->articles()->saveMany([
             new Article([
                'name' => 'New article2233',
                'text' =>  'Same text for new article'
             ]),
             new Article([
                'name' => 'New article2255',
                'text' =>  'Same text for new article'
             ])
         ]); */

         // Добавляем роль связанную с Юзер
         /*$role = new Role(['name'=> 'guest']);
         $user->roles()->save($role);
*/

/*        $user->articles()->where('id',21)->update(['name'=>'New Blog Post 555']); 

        $articles = Article::all();
        dump($articles);
*/
//Заменить значение в таблицы с помощью модели (переназначить пользователя)
/*        
        $articles = Article::all(); // создаем коллекцию моделей articles
        $user = User::find(2); // передаем в переменную user модель с id 2
        foreach($articles as $article) {
            $article->user()->associate($user); // Перезаписываем все статьи на юзера с ид 2
            $article->save(); // сохраняем
        }
*/
/*        
        $user = User::find(2); // в переменную закидываем модель с ид 2
        $role_id = Role::find(2)->id; // в переменную закидываем срвазу ид роли с ид 2

        $user->roles()->attach($role_id); // ДОБАВЛЯЕМ запись в таблицу role для пользователя с ид 2 
        $user->roles()->detach($role_id); // УДАЛЯЕМ запись в таблицу role для пользователя с ид 2
*/
        // method Reader (getter)
/*
        $article = Article::find(21);
        echo $article->name;
*/
        // Method (setter)
        $article = Article::find(21);
        $article->name = 'New Head';
        echo $article->name;


        return;
    }

    public function getArticle()
    {
        
    }

}
