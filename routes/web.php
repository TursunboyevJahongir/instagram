<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{username}', 'ProfilesController@profile');
Route::get('profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('profile/{user}','ProfilesController@update');

Route::get('/password/change/{user}', 'ProfilesController@passwordGet');//todo
Route::patch('/profile/{user}','ProfilesController@update');

Route::get('/post/create','PostsController@create');
//Route::get('/post/create',function (){
//    return 'cd';
//});
Route::get('/post/{slug}','PostsController@show');
Route::post('/post','PostsController@store');

Route::post('/commentary/{slug}','CommentaryController@index');

