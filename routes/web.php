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

Route::get('/contact',['uses'=>'Admin\ContactController@show'])->name('contact');
Route::post('/contact',['uses'=>'Admin\ContactController@store']);
//Route::match(['get','post'],'/contact',['uses'=>'Admin\ContactController@show'])->name('contact');

Route::resource('/pages','Admin\CoreResourse');

/* 
// Authentification automaticly
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
*/
// By hand

Auth::routes();

Route::group(['prefix'=>'admin', 'middleware'=>['web','auth']], function() {
    Route::get('/', ['uses' => 'Admin\AdminController@show'])->name('admin_index');
   
    Route::get('/add/post', ['uses' => 'Admin\AdminPostController@show'])->name('admin_add_post');
    Route::post('add/post/', ['uses' => 'Admin\AdminPostController@create'])->name('admin_add_post_p');


    Route::get('/update/post/{id}', ['uses' => 'Admin\AdminUpdatePostController@show'])->name('admin_update_post');
    Route::post('/update/post', ['uses' => 'Admin\AdminUpdatePostController@create'])->name('admin_update_post_p');

    Route::group(['prefix'=>'products'], function() {

        Route::get('/', ['uses' => 'ProductsController@execute'])->name('products');
        Route::match(['get','post'],'/add',['uses' => 'Admin\ProductsAddController@execute'])->name('productsAdd');
//        Route::get('/edit/{product}', ['uses' => 'Admin\ProductEditController@execute'])->name('productEdit');
        Route::match(['get', 'post', 'delete'],'/edit/{product}', ['uses' => 'Admin\ProductEditController@execute'])->name('productEdit');
        Route::get('/delete/{id}', ['uses' => 'Admin\ProductEditController@destroy'])->name('productDelete');
        Route::get('/{slug}', ['uses' => 'ProductController@execute'])->name('product');

    });
    
});
