<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['uses'=>'Admin\IndexController@show'])->name('home');

Route::get('/about', ['uses'=>'Admin\AboutController@show'])->name('about');

Route::get('/articles', ['uses'=>'Admin\Core@getArticles'])->name('articles');

Route::get('/article/{id}', ['uses'=>'Admin\Core@getArticle'])->name('article');

Route::match(['get','post'],'/contact',['uses'=>'Admin\ContactController@show'])->name('contact');

Route::resource('/pages','Admin\CoreResourse');
