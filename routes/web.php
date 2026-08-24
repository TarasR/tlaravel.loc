<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Admin\IndexController@show')->name('home');

Route::get('/about', 'Admin\AboutController@show')->name('about');

Route::get('/articles', 'Admin\Core@getArticles')->name('articles');

Route::get('/article/{id}', 'Admin\Core@getArticle')->name('article');

Route::get('/contact', 'Admin\ContactController@show')->name('contact');
Route::post('/contact', 'Admin\ContactController@store');
//Route::match(['get','post'],'/contact',['uses'=>'Admin\ContactController@show'])->name('contact');

Route::resource('/pages', 'Admin\CoreResourse')->middleware('auth');

/*
// Authentification automaticly
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
*/
// By hand

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'Admin\AdminController@show')->name('admin_index');

    Route::get('/add/post', 'Admin\AdminPostController@show')->name('admin_add_post');
    Route::post('add/post/', 'Admin\AdminPostController@create')->name('admin_add_post_p');


    Route::get('/update/post/{id}', 'Admin\AdminUpdatePostController@show')->name('admin_update_post');
    Route::post('/update/post', 'Admin\AdminUpdatePostController@create')->name('admin_update_post_p');

    Route::group(['prefix' => 'products'], function () {

        Route::get('/', 'ProductsController@execute')->name('products');
        Route::match(['get', 'post'], '/add', 'Admin\ProductsAddController@execute')->name('productsAdd');
        //        Route::get('/edit/{product}', ['uses' => 'Admin\ProductEditController@execute'])->name('productEdit');
        Route::match(['get', 'post', 'delete'], '/edit/{product}', 'Admin\ProductEditController@execute')->name('productEdit');
        Route::get('/delete/{id}', 'Admin\ProductEditController@destroy')->name('productDelete');
        Route::get('/{slug}', 'ProductController@execute')->name('product');
    });
});
